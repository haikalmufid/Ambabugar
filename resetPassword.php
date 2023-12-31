<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Reset Password</title>
</head>
<body>
    <div class="w-full h-screen bg-gray-200 flex justify-center items-center">
        <div class="px-9 lg:w-2/5 dark:bg-gray-800 transition-colors duration-300">
            <div class="container mx-auto p-4">
                <div class="bg-white dark:bg-gray-700 shadow-lg shadow-gray-300 rounded-lg p-6">
                    <span class="flex justify-center font-bold text-xl mb-4">Reset Password</span>
                    <form name="reset-password" action="resetPasswordController.php" method="post">
                        <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : ''; ?>">
                        <div class="mb-4">
                            <label for="newPassword" class="mb-1 ml-1">New Password</label>
                            <input type="password" id="newPassword" name="newPassword" placeholder="New Password" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="confirmNewPassword" class="mb-1 ml-1">Confirm New Password</label>
                            <input type="password" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm New Password" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="flex flex-row justify-between items-center">
                            <button type="submit" class="min-w-[25%] px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
