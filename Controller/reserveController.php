<?php
session_start();

require_once '../Model/db_connection.php';

$conn = new DatabaseConnection();
$db = $conn->getConnection();

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $paket = mysqli_real_escape_string($db, $_POST['paket']);
    $tempat_pijat = mysqli_real_escape_string($db, $_POST['tempat-pijat']);
    $pembayaran = mysqli_real_escape_string($db, $_POST['pembayaran']);
    $lokasi = mysqli_real_escape_string($db, $_POST['lokasi']);
    $totalharga = mysqli_real_escape_string($db, $_POST['totalharga']);

    $sql = "INSERT INTO reservation (user_id, nama, date, time, paket, tempat_pijat, pembayaran, lokasi, totalharga)
            VALUES ('$user_id', '$nama', '$date', '$time', '$paket', '$tempat_pijat', '$pembayaran', '$lokasi', '$totalharga')";

    if ($db->query($sql) === TRUE) {
        '<script>alert("Pemesanan Berhasil! Terima kasih atas pemesanannya.");</script>';
        header("Location: ../index.php");
    } else {
        echo json_encode(array("status" => "error", "message" => "Error: " . $sql . '\n' . $db->error));
    }

    // Close database connection
    $conn->closeConnection();
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>
