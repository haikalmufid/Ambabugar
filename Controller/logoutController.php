<?php
session_start();

// Hancurkan semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Alihkan pengguna ke halaman login atau halaman lain yang sesuai
header("Location: ../index.php");
exit();
?>
