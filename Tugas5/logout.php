<?php
session_start();
// Menghapus semua data sesi
session_unset();
// Menghancurkan sesi
session_destroy();
// Mengarahkan pengguna kembali ke halaman login
header("Location: login.php");
exit();
?>