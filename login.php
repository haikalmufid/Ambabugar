<?php
// ...
if (isset($_GET["error"]) && $_GET["error"] == "login_failed") {
    echo '<script>alert("Login gagal. Periksa kembali username dan password Anda.");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body>
    <div class="w-full h-screen bg-gray-200 flex justify-center items-center">
        <div class="px-9 min-w-[500px] w-[35%] dark:bg-gray-800 transition-colors duration-300">
            <div class="container mx-auto p-4">
                <div class="bg-white dark:bg-gray-700 shadow-lg shadow-gray-300 rounded-lg p-6">
                    <span class="flex justify-center font-bold text-2xl mb-4">Login</span>
                    <form action="Controller/loginController.php" method="post">
                        <div class="mb-4">
                            <div class="ml-1">
                                <i class="fa-solid fa-user text-sm"></i>
                                <label for="username" class="ml-1">Username</label>
                            </div>
                            <input type="text"  name="username" id="username" placeholder="Username" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="mb-3">
                            <div class="ml-1">
                                <i class="fa-solid fa-key text-sm"></i>
                                <label for="password" class="mb-1 ml-1">Password</label>
                            </div>
                            <input type="password" name="password" id="password" placeholder="************" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="flex flex-col justify-between items-center">
                            <div class="flex justify-end item-center mb-4 w-full pr-1">
                                <a href="forgetPassword.php" class="text-gray-500 text-xs">Forget Password?</a>
                            </div>
                            <button type="submit" id="button_login" class="min-w-[50%] px-4 py-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                Login
                            </button>
                            <hr class="border-1 border-gray-400 w-[80%] my-4">
                            <div class="flex flex-row gap-1 justify-center items-center">
                                <span class="text-gray-500 text-sm">Dont have an account?</span>
                                <a href="registrasi.php" class="text-gray-800  text-sm font-semibold">Sign Up</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>