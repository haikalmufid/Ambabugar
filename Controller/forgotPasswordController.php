<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Panggil fungsi untuk menyambungkan ke database
    $conn = connectToDatabase();

    // Hindari SQL Injection dengan menggunakan prepared statement
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND email = ?");
    $stmt->bind_param("ss", $username, $email);

    // Eksekusi query
    $stmt->execute();

    // Ambil hasil query
    $result = $stmt->get_result();

    // Periksa apakah data pengguna ditemukan
    if ($result->num_rows > 0) {
        // Generate token unik untuk reset password (contoh: menggunakan fungsi uniqid)
        $resetToken = uniqid();

        // Simpan token ke database (tabel reset_password)
        $insertTokenStmt = $conn->prepare("INSERT INTO reset_password (username, token, created_at) VALUES (?, ?, NOW())");
        $insertTokenStmt->bind_param("ss", $username, $resetToken);
        $insertTokenStmt->execute();

        // Kirim email dengan link reset password yang berisi token
        $resetLink = "http://yourdomain.com/resetPassword.php?token=$resetToken";
        $to = $email;
        $subject = "Reset Password";
        $message = "Click the following link to reset your password: $resetLink";
        $headers = "From: your-email@example.com"; // Sesuaikan dengan email pengirim

        // Kirim email
        mail($to, $subject, $message, $headers);

        // Redirect to resetPassword.php
        header("Location: resetPassword.php?token=$resetToken");
        exit();
    } else {
        echo "Invalid username or email";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $insertTokenStmt->close();
    $conn->close();
}
?>
