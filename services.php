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
        <div class="w-[100%] bg-cover bg-center bg-blend-multiply bg-slate-400 h-[80vh] flex justify-center items-center" style="background-image: url('img/services/services.jpg ');">
            <span class="text-4xl text-slate-200 font-serif">Services</span>
        </div>
    </div>

    <div class="flex flex-col w-full mt-12">
        <div class="flex md:flex-row flex-col items-center justify-center md:mx-20 ">
            <img src="img/services/img-3.jpg" class="lg:w-[43%] md:w-[50%]" alt="">
            <div class="flex flex-col justify-center lg:w-[40%] md:my-0 my-5 md:ml-7 ml-5 mr-5">
                <span class="lg:text-xl font-semibold mb-3">Apa sih yang di maksud Pijat?</span>
                <p class="font-light text-sm mb-2">
                    Pijat adalah metode menyembuhkan/terapi kesehatan
                    traditional,dengan cara memberikan tekanan kepada
                    tubuh,baik secara terstruktur,tidak
                    terstruktur,menatap,atau berpindah tempat dengan
                    memberikan tekanan,gerakan,getaran,baik secara
                    manual ataupun menggunakan alat mekanis
                </p>
                <p class="font-light text-sm">
                    Pijat refleksi merupakan ilmu yang
                    mempelajari ilmu tentang pijat di titik-titik
                    tubuh tertentu. Pijat ini dilakukan dengan
                    alat tangan dan benda-benda lain berupa
                    kayu, plastik, atau karet. Praktisi pijat ini
                    mempunyai pengetahuan tentang sarafsaraf manusia.
                </p>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center my-20 text-center">
            <span class=" font-semibold text-xl mb-3">Kenapa Kita Harus di Refleksi?</span>
            <p class="md:w-[40%] w-[60%] font-light">
                Karena refleksi dapat membantu
                memperlancar aliran darah dan
                memperbaiki fungsi organ tubuh yang terkait
            </p>
        </div>

        <div class="flex md:flex-row flex-col items-center justify-center md:mx-20 mb-10">
            <img src="img/services/pijat-tangan.jpg" class="lg:w-[30%] md:w-[40%]" alt="">
            <div class="flex flex-col justify-center lg:w-[30%] md:my-0 my-5 md:ml-14 ml-5 mr-5">
                <span class="lg:text-xl font-semibold mb-5">Titik Refleksi Tangan</span>
                <p class="font-light text-sm mb-2">
                Pijat pada titik refleksi tangan, atau yang juga dikenal sebagai akupresur, merupakan bentuk pengobatan alternatif atau komplementer yang diminati oleh banyak orang selain pengobatan medis konvensional.
                </p>
                <p class="font-light text-sm">
                Terapi ini didasarkan pada keyakinan bahwa ada titik-titik refleksi pada tangan yang terhubung dengan berbagai bagian tubuh. Melalui penerapan tekanan atau pijatan pada titik-titik ini, diharapkan dapat meredakan beberapa penyakit atau gangguan kesehatan.
                </p>
            </div>
        </div>

        <div class="flex md:flex-row-reverse flex-col items-center justify-center md:mx-20 mb-20">
            <img src="img/services/pijat-kaki.jpg" class="lg:w-[30%] md:w-[40%] w-[70%]" alt="">
            <div class="flex flex-col justify-center lg:w-[30%] md:my-0 my-5 md:mr-14 ml-5 mr-5">
                <span class="lg:text-xl font-semibold mb-5">Titik Refleksi Kaki</span>
                <p class="font-light text-sm mb-2">
                Pijat pada titik refleksi kaki adalah bentuk terapi pijat yang berfokus pada tekanan pada titik-titik tertentu di kaki. Konsep dasarnya adalah bahwa titik-titik refleksi ini terkait dengan organ dan sistem tubuh lainnya. Dengan merangsang titik-titik ini melalui pijatan, tujuan utamanya adalah untuk meningkatkan kesejahteraan dan kesehatan secara keseluruhan.
                </p>
                <p class="font-light text-sm">
                Pijat refleksi kaki diyakini dapat membantu meredakan ketegangan, meningkatkan sirkulasi darah, dan mempromosikan keseimbangan energi dalam tubuh. Meskipun pijat refleksi kaki populer sebagai bentuk perawatan holistik, penting untuk diingat bahwa efektivitasnya dapat bervariasi dan sebaiknya dikombinasikan dengan praktek kesehatan yang komprehensif.
                </p>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center mb-10">
            <span class="font-semibold text-xl mb-3">MANFAAT PIJAT REFLEKSI</span>
            <ul class="list-disc w-[20%] font-light ml-14">
                <li class="mb-2">Melancarkan aliran darah</li>
                <li class="mb-2">Meningkatkan daya tahan tubuh</li>
                <li class="mb-2">Mengurangi resiko sakit sendi</li>
                <li class="mb-2">Melancarkan pergerakan dan mengatasi masalah pencernaan</li>
                <li class="mb-2">Mengurangi rasa letih</li>
            </ul>
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