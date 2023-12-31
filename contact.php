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

                        // Function to simulate getting user ID from the database
                        function getUserIDFromDatabase($username) {
                            // Replace this with your actual database query logic
                            // For example, you might use a query like SELECT user_id FROM users WHERE username = '...';
                            // This is just a placeholder, replace it with your actual logic.
                            // Ensure you sanitize input and use prepared statements to prevent SQL injection.
                            return 123; // Replace with the actual user ID from your database
                        }

                        // Cek apakah pengguna sudah login
                        if (isset($_SESSION["username"])) {
                            // Check if the function exists before calling it
                            if (function_exists('getUserIDFromDatabase')) {
                                // Di sini, seharusnya Anda mendapatkan data pengguna dari database,
                                // seperti ID pengguna, dan menyimpannya ke dalam $_SESSION['user_id']
                                $user_id = getUserIDFromDatabase($_SESSION["username"]); // Gantilah dengan fungsi yang sesuai
                                $_SESSION['user_id'] = $user_id; // Isi dengan identitas unik pengguna, seperti ID dari database

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
                                // Handle the case where the function doesn't exist
                                echo 'Error: getUserIDFromDatabase function is not defined.';
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
        <div class="w-[100%] bg-cover bg-center bg-blend-multiply bg-slate-400 h-[80vh] flex justify-center items-center" style="background-image: url('img/contact/img-pijat.jpg ');">
            <span class="text-4xl text-slate-200 font-serif">Contact Us</span>
        </div>
    </div>
    
    <div class="py-10 flex flex-col justify-center items-center">
        <div class="md:w-1/2 w-full">
            <p class="text-xl text-center font-semibold my-8 mx-10">
                Silakan menghubungi kami menggunakan formulir di bawah ini
                dan kami akan segera menghubungi Anda, terima kasih!
            </p>
            <div class="px-9 dark:bg-gray-800 transition-colors duration-300">
                <div class="container mx-auto p-4">
                    <div class="bg-white dark:bg-gray-700 shadow-lg shadow-gray-300 rounded-lg p-6">
                        <form>
                            <div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="first-name" class="mb-1 ml-1">First name</label>
                                        <input type="text" id="first-name" placeholder="First name" class="border border-gray-300 p-2 rounded w-full" required>
                                    </div>
                                    <div>
                                        <label for="last-name" class="mb-1 ml-1">Last name</label>
                                        <input type="text" id="last-name" placeholder="Last name" class="border border-gray-300 p-2 rounded w-full" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="mb-1 ml-1">Email</label>
                                <input type="email" id="email" placeholder="Email address" class="border border-gray-300 p-2 rounded w-full" required>
                            </div>
                            <div class="mb-4">
                                <label class="mb-1 ml-1">Alamat</label>
                                <input type="text" id="alamat" placeholder="Street address" class="border border-gray-300 p-2 rounded w-full" required>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 ml-1">Pesan</label>
                                <textarea name="message" id="pesan" placeholder="Massage" class="w-full border border-gray-300 rounded py-2 px-3" required></textarea>
                            </div>

                            <button type="submit" id="kirim" class="min-w-[25%] px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                Kirim
                            </button>
                        </form>
                    </div>
                </div>
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
