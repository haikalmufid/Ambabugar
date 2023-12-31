<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Amba Bugar - Relax and Rejuvenate</title>
</head>
<body class="font-Poppins bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 class="text-4xl font-semibold mb-4">Welcome to Amba Bugar</h1>
        <p class="text-lg text-gray-700 mb-8">Your destination for relaxation and rejuvenation</p>

        <div class="grid grid-cols-1 md:grid-cols-2 mb-4 gap-8">
            <a href="reserve/reserve.php" class="bg-blue-500 text-white py-8 px-12 rounded-lg transition transform hover:scale-105">
                <i class="fas fa-calendar-plus text-4xl mb-4"></i>
                <h3 class="font-semibold text-xl">Reserve Now</h3>
                <p class="text-sm">Book your appointment now</p>
            </a>

            <a href="reserve/order-list.php" class="bg-green-500 text-white py-8 px-12 rounded-lg transition transform hover:scale-105">
                <i class="fas fa-list text-4xl mb-4"></i>
                <h3 class="font-semibold text-xl">Order List</h3>
                <p class="text-sm">View your reservation history</p>
            </a>
        </div>
        <button onclick="goBack()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4">Kembali</button>
    </div>
    </div>

</body>
    <script>
        // JavaScript function to go back to the previous page
        function goBack() {
            window.history.back();
        }
    </script>
</html>
