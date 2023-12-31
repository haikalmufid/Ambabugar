<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ambabugar</title>
</head>
<body class="font-[Poppins] bg-white">
        <div class="fixed top-0 bg-white shadow-xl w-full z-30">
            <div class="flex w-[92%] h-[10vh] justify-between mx-auto">
                <a href="index.php" class="flex flex-row items-center">
                    <img src="img/logo.jpeg" class="h-10" alt="">
                    <span class="text-xl font-bold mx-3 uppercase">Ambabugar</span>
                </a>
                <div class="flex items-center">
                    <div class="navLinks md:static absolute md:shadow-none shadow-xl bg-white md:w-auto md:min-h-fit min-h-[30vh] left-0 top-[-500%] w-full flex items-center px-5">
                        <ul class="flex md:flex-row flex-col md:items-center md:gap-4 gap-6">
                            <li class="hover:text-gray-500 lg:px-3 py-1 rounded-xl lg:text-lg" ><a id="reserveLink" href="home_reserve.php">Reserve</a></li>
                            <li class="hover:text-gray-500 lg:px-3 py-1 rounded-xl lg:text-lg" ><a href="services.php">Services</a></li>
                            <li class="hover:text-gray-500 lg:px-3 py-1 rounded-xl lg:text-lg" ><a href="about.php">About Us</a></li>
                            <li class="hover:text-gray-500 lg:px-3 py-1 rounded-xl lg:text-lg" ><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                <?php
                        session_start();

                        require_once 'connection/db_connection.php';

                        // Cek apakah pengguna sudah login
                        if (isset($_SESSION["username"])) {
                            // Function to get user ID from the database
                            function getUserIDFromDatabase($username) {
                                $conn = new DatabaseConnection();
                                $db = $conn->getConnection();

                                $username = mysqli_real_escape_string($db, $username);

                                $sql = "SELECT user_id FROM user WHERE username = '$username'";
                                $result = $db->query($sql);

                                if (!$result) {
                                    die('Error in SQL query: ' . $db->error);
                                }

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    return $row['user_id'];
                                }

                                $conn->closeConnection();
                                return null;
                            }

                            // Get user ID
                            $user_id = getUserIDFromDatabase($_SESSION["username"]);

                            // Check if the function exists before calling it
                            if ($user_id !== null) {
                                $_SESSION['user_id'] = $user_id;

                                // Jika sudah login, tampilkan tombol logout
                                echo '<div class="relative inline-block text-left">
                                    <!-- Dropdown button -->
                                    <button type="button" class="inline-flex items-center relative rounded-full" onclick="toggleDropdown()">
                                        <div class="block flex-grow-0 flex-shrink-0 md:h-10 md:w-12 h-8 w-10">
                                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 100%; width: 100%; fill: currentcolor;">
                                                <path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z"></path>
                                            </svg>
                                        </div>
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div id="dropdown" class="hidden absolute right-0 mt-2 bg-white border rounded-md shadow-lg">
                                        <a href="Controller/logoutController.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Logout</a>
                                    </div>
                                </div>';
                            } else {
                                // Handle the case where the user is not found
                                echo 'Error: User not found.';
                            }
                        } else {
                            // Jika belum login, tampilkan tombol login dan signup
                            echo '<a href="login.php" class="text-white rounded-full bg-gray-500 hover:bg-gray-700 px-5 py-2">Login</a>';
                            echo '<a href="registrasi.php" class="px-3 py-2">Signup</a>';
                            echo '<script>
                                var reserveLink = document.getElementById("reserveLink");
                                if (reserveLink) {
                                    reserveLink.href = "login.php";
                                }
                            </script>';
                        }
                        ?>
                    <ion-icon onclick="onToggleMenu(this)" name="menu-outline" class="md:hidden cursor-pointer"></ion-icon>
                </div>

            </div>
        </div>

    <div class="mt-[10vh] flex">
        <div class="w-[100%] bg-cover bg-center bg-blend-multiply bg-slate-400 h-[80vh] flex justify-center items-center" style="background-image: url('img/about.jpg')">
            <span class="text-4xl text-slate-200 font-serif">About Us</span>
        </div>
    </div>

    <div class="w-full flex flex-col justify-center my-14 items-center">
        <div class="h-fit flex md:flex-row flex-col-reverse md:mx-20 mx-3 justify-center items-center my-5">
            <p class="md:mr-5 mt-2 mx-3 md:w-1/3 font-light text-center text-gray-600">
                Selamat datang di Pijat Refleksi Amba Bugar, sebuah pusat perawatan kesehatan yang menghadirkan pengalaman pijat refleksi yang holistik. Dengan kombinasi cermat antara teknik tradisional dan inovasi modern, kami berkomitmen untuk memberikan layanan pijat yang tidak hanya mengurangi ketegangan fisik, tetapi juga mendukung keseimbangan tubuh secara menyeluruh.
            </p>
            <img class="md:w-1/3" src="img/about/fasilitas.jpg" alt="">
        </div>
        <div class="h-fit flex md:flex-row flex-col md:mx-20 mx-3 justify-center items-center my-5">
            <img class="md:w-1/3" src="img/about/fasilitas2.jpg" alt="">
            <p class="md:ml-5 mt-2 mx-3 md:w-1/3 font-light text-center text-gray-600">
                Pijat Refleksi Amba Bugar dikelola oleh tim terapis terlatih yang memiliki pemahaman mendalam tentang seni pijat refleksi. Setiap sesi dirancang dengan teliti, menekankan kenyamanan dan kepuasan klien. Melalui pendekatan ini, kami menyediakan ruang bagi individu untuk mencapai relaksasi, meredakan stres, dan memperoleh manfaat kesehatan yang optimal.
            </p>
        </div>
        <div class="h-fit flex md:flex-row flex-col-reverse md:mx-20 mx-3 justify-center items-center my-5">
            <p class="md:mr-5 mt-2 mx-3 md:w-1/3 font-light text-center text-gray-600">
                Kami percaya bahwa pijat bukan hanya sekadar sarana untuk mengatasi lelah dan pegal, tetapi juga merupakan bagian integral dari perawatan kesehatan preventif. Dengan penuh dedikasi, Pijat Refleksi Amba Bugar mengundang Anda untuk mengeksplorasi manfaat kesehatan menyeluruh melalui pengalaman pijat refleksi kami yang terampil dan terapeutik.
            </p>
            <img class="md:w-1/3" src="img/about/fasilitas3.jpg" alt="">
        </div>
    </div>

    <div class="w-full h-[350px] bg-gray-100">
        <div class="flex flex-col items-center">
            <div class="flex-col text-center mt-8">
                <span class="font-semibold">Open - Closed</span>
                <div class="flex flex-col font-light mt-2">
                    <span class="">Senin - Sabtu: 9.00 - 21.00</span>
                    <span class="">Minggu: 10.00 - 22.00</span>
                </div>
            </div>
            <div class="flex flex-row md:gap-7 gap-5 my-8">
                <a href="https://www.facebook.com/profile.php?id=100013273503864" class="w-[48px] h-[48px] flex text-center justify-center items-center text-2xl text-white bg-gray-700 hover:bg-gray-900 py-2 px-3 rounded-full"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/kalhaikalm/" class="w-[48px] h-[48px] flex text-center justify-center items-center text-2xl text-white bg-gray-700 hover:bg-gray-900 py-2 px-3 rounded-full"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@michi.michii" class="w-[48px] h-[48px] flex text-center justify-center items-center text-2xl text-white bg-gray-700 hover:bg-gray-900 py-2 px-3 rounded-full"><i class="fa-brands fa-tiktok"></i></a>
            </div>
            <div class="w-full">
                <ul class="flex flex-row justify-center gap-4 mx-5">
                    <li><a href="" class="font-semibold uppercase text-center text-sm">Contact</a></li>
                    <li><a href="" class="font-semibold uppercase text-center text-sm">Massage Policy</a></li>
                    <li><a href="" class="font-semibold uppercase text-center text-sm">Order & Payment</a></li>
                    <li><a href="" class="font-semibold uppercase text-center text-sm">Terms & Conditions</a></li>
                </ul>
            </div>
            <div>
                <p class="mt-5 font-extralight">© All Rights Reserved.</p>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }
    </script>

  <script src="script.js"></script>
</body>
</html>