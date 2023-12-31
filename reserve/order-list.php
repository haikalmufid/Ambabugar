<?php
session_start();

include('../Model/db_connection.php');

$dbConnection = new DatabaseConnection();

$conn = $dbConnection->getConnection();

$user_id = $_SESSION['user_id'];

function deleteReservation($conn, $id, $user_id) {
    $sql = "DELETE FROM reservation WHERE id = '$id' AND user_id = '$user_id'";

    if ($conn->query($sql) === TRUE) {
        return true; // Deletion successful
    } else {
        return false; // Error in deletion
    }
}

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];

    $deleteResult = deleteReservation($conn, $id, $user_id);

    if ($deleteResult) {
        echo "<script>alert('Reservation deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting reservation');</script>";
    }
}

$sql = "SELECT * FROM reservation WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-md p-8">
        <h1 class="text-3xl font-semibold mb-6">Order List</h1>

        <?php
        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="border p-4 rounded-md flex justify-between mb-4 items-start">
                    <div>
                        <p class="text-lg font-semibold mb-2"><?= $row['nama'] ?></p>
                        <p><strong>Date:</strong> <?= $row['date'] ?></p>
                        <p><strong>Time:</strong> <?= $row['time'] ?></p>
                        <p><strong>Paket:</strong> <?= $row['paket'] ?></p>
                        <p><strong>Tempat Pijat:</strong> <?= $row['tempat_pijat'] ?></p>
                        <p><strong>Pembayaran:</strong> <?= $row['pembayaran'] ?></p>
                        <p><strong>Location:</strong> <?= $row['lokasi'] ?></p>
                        <p><strong>Total Harga:</strong> Rp. <?= $row['totalharga'] ?></p>
                    </div>
                    <div class="mt-4 flex flex-row bg-slate-500 w-14 justify-between rounded-md mr-6">
                        <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this reservation?')" class="text-red-500 hover:underline text-xl"><i class="fa-solid fa-trash"></i></a>
                        <a href="updateResevartion.php" class="text-blue-500 hover:underline text-xl"><i class="fa-regular fa-pen-to-square"></i></a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Tidak ada pesanan.</p>";
        }
        ?>
    <button onclick="goBack()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4">Kembali</button>
    </div>
    </div>
</body>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</html>

<?php
$conn->close();
?>
