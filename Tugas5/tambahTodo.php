<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $todolist = $_POST['todolist'];
    $username = $_SESSION['username'];

    // Mengambil user_id dari username
    $sql_user_id = "SELECT id FROM user WHERE username='$username'";
    $result_user_id = mysqli_query($conn, $sql_user_id);
    $row_user_id = mysqli_fetch_assoc($result_user_id);
    $user_id = $row_user_id['id'];

    // Query tambah todo
    $sql = "INSERT INTO todo (todolist, user_id, status) VALUES ('$todolist', '$user_id', 'Belum Selesai')";

    if (mysqli_query($conn, $sql)) {
        header("Location: todoList.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>