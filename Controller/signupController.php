<?php
session_start();

include('../Model/db_connection.php');

$dbConnection = new DatabaseConnection();
$conn = $dbConnection->getConnection();

$user_id = $_SESSION['user_id'];

// Check if $reservation is set
$reservation = isset($reservation) ? $reservation : array('id' => '', 'nama' => '', 'date' => '', 'time' => '', 'paket' => '', 'tempat' => '', 'pembayaran' => '', 'totalharga' => '', 'lokasi' => '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Clear existing data
    $clearSql = "UPDATE reservation SET nama = NULL, date = NULL, time = NULL, paket = NULL, tempat_pijat = NULL,
                 pembayaran = NULL, lokasi = NULL, totalharga = NULL
                 WHERE id = '$id' AND user_id = '$user_id'";

    if ($conn->query($clearSql) === TRUE) {
        // Retrieve other POST data
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $paket = mysqli_real_escape_string($conn, $_POST['paket']);
        $tempat_pijat = mysqli_real_escape_string($conn, $_POST['tempat-pijat']);
        $pembayaran = mysqli_real_escape_string($conn, $_POST['pembayaran']);
        $totalharga = mysqli_real_escape_string($conn, $_POST['totalharga']);
        $lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);

        // Update the reservation
        $updateSql = "UPDATE reservation
                      SET nama = '$nama', date = '$date', time = '$time', paket = '$paket', tempat_pijat = '$tempat_pijat',
                          pembayaran = '$pembayaran', lokasi = '$lokasi', totalharga = '$totalharga'
                      WHERE id = '$id' AND user_id = '$user_id'";

        if ($conn->query($updateSql) === TRUE) {
            echo json_encode(array("status" => "success", "message" => "Update successful."));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error updating reservation."));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Error clearing existing data."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}

$conn->close();

header('')
?>
