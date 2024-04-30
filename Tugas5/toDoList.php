<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$username = $_SESSION['username'];

// Query ambil todo list
$sql = "SELECT * FROM todo WHERE user_id = (SELECT id FROM user WHERE username = '$username')";
$result = mysqli_query($conn, $sql);

// Menampilkan todo list
?>