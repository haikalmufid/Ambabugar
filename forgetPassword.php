<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Forget Password</title>
</head>
<body>
    <div class="w-full h-screen bg-gray-200 flex justify-center items-center">
        <div class="px-9 lg:w-2/5 dark:bg-gray-800 transition-colors duration-300">
            <div class="container mx-auto p-4">
                <div class="bg-white dark:bg-gray-700 shadow-lg shadow-gray-300 rounded-lg p-6">
                    <span class="flex justify-center font-bold text-xl mb-4">Forget Password</span>
                    <form name="forget-password" action="forgotPasswordController.php" method="post">
                        <div class="mb-4">
                            <label for="username" class="mb-1 ml-1">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="mb-1 ml-1">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email Address" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="flex flex-row justify-between items-center">
                            <button type="submit" class="min-w-[25%] px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                Send Reset Link
                            </button>
                            <a href="login.php" class="text-gray-500 text-sm">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
