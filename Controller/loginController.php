<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once '../Model/db_connection.php';

    $conn = new DatabaseConnection();
    $db = $conn->getConnection();

    // Avoid SQL Injection using prepared statement
    $stmt = $db->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Execute query
    $stmt->execute();

    // Get query result
    $result = $stmt->get_result();

    // Check if user data is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION["user_id"] = $user['id']; // Save user_id to session
        $_SESSION["username"] = $username;
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../login.php?error=login_failed");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->closeConnection();
}
?>