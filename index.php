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
        <title>Amba Bugar</title>
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

    <div class="h-[90vh] mt-[10vh] mb-10 bg-cover bg-bottom bg-gray-400 bg-blend-multiply" style="background-image: url('img/home/home-page.jpg');">
        <div class="w-full h-full flex justify-center items-center">
            <div class="flex flex-col text-white items-center">
                <span class="md:text-3xl text-2xl uppercase font-serif">Ambabugar</span>
                <div class="font-extralight">PIJAT REFLEKSI dan TRADISIONAL</div>
                <a class="px-4 py-2 rounded-sm mt-4 bg-slate-800" href="services.php">Learn More</a>
            </div>
        </div>
    </div>

    <div class="w-full xl:h-[90vh] lg:h-[70vh] md:h-[60vh] flex justify-center">
        <div class="mt-8 lg:w-[50%] sm:w-[65%] w-[75%] flex flex-col items-center">
            <span class="md:text-3xl md:my-8 text-xl my-5 font-semibold tracking-[.1em] text-center">Nikmati ketenangan di AmbaBugar.</span>
            <p class="font-extralight text-center leading-loose xl:text-xl md:text-lg sm:text-sm text-xs">
Dengan sejumlah cabang yang tersebar di Jakarta Timur, para penduduk yang memiliki kesibukan tinggi di Jakarta Timur dapat menikmati layanan pijat tradisional, terapi tubuh, atau pelayanan eksklusif dalam suasana yang nyaman. Kami menawarkan pengalaman relaksasi yang tak tertandingi dengan rangkaian layanan pijat dan terapi tubuh yang disempurnakan oleh keahlian tinggi dari terapis profesional kami. Kami mengundang Anda untuk menemukan momen ketenangan yang menyegarkan di pusat pijat tradisional kami, sementara kami berkomitmen untuk memberikan keunggulan dan kualitas yang sesuai dengan ekspektasi Anda.
            </p>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center mt-16 mb-10">
        <span class="font-semibold my-5 md:text-3xl text-2xl">Galery</span>
        <div class="2xl:w-[85%] xl:w-[90%] w-[95%] flex md:flex-row flex-col">
            <img class="md:w-[70%] md:h-[80vh]" src="img/galery/bekam.jpg" alt="">
            <div class="md:w-[35%] flex flex-col">
                <img class="md:h-[40vh] max-h-[500px] bg-cover" src="img/galery/pijat2.avif" alt="">
                <img class="md:h-[40vh] max-h-[500px]" src="img/galery/pijat.avif" alt="">
            </div>
        </div>
    </div>

    <div class="py-12 my-10 bg-slate-50 flex md:flex-row flex-col-reverse justify-center items-center gap-9">
        <div class="flex md:justify-end justify-center items-center md:w-[50%] w-full md:pr-20">
            <iframe class="md:rounded-r-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d507624.93775390333!2d106.24088368906251!3d-6.287398599999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f26fcde0e35f%3A0xcc66a7118831e7bd!2sReflexi%20Amba%20Bugar!5e0!3m2!1sid!2sid!4v1702052196708!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" crossorigin></iframe>
        </div>
        <div class="flex flex-col justify-center gap-3 items-center md:w-[50%]">
            <h2 class="font-semibold text-2xl">Location</h2>
            <div class="lg:w-[60%] md:w-[70%] w-[40%] my-1 tracking-wide">
                <div class="mb-3">
                    <h3 class="font-medium text-lg my-1"><i class="fa-solid fa-location-dot mr-2"></i>Cabang 1</h3>
                    <p class="">Jl. Kayu Manis No.12, RT.7/RW.5, Balekambang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13530</p>
                </div>
                <div class="">
                    <h3 class="font-medium text-lg my-1"><i class="fa-solid fa-location-dot mr-2"></i>Cabang 2</h3>
                    <p class="">Jl. Kayu Manis No.12, RT.7/RW.5, Balekambang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13530</p>
                </div>
            </div>
            
        
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