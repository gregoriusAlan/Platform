<?php
session_start();
// print_r($_SESSION);
// print_r($_COOKIE);
include 'connect_mysql.php';
if (isset($_POST['add'])) {
  $task = $_POST['task'];
}

// var_dump($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Bootsrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/77fa9a8db9.js" crossorigin="anonymous"></script>
  <!-- Style -->
  <style>
    #list1 .form-control {
      border-color: transparent;
    }

    #list1 .form-control:focus {
      border-color: transparent;
      box-shadow: none;
    }

    #list1 .select-input.form-control[readonly]:not([disabled]) {
      background-color: #fbfbfb;
    }
  </style>
  <title>ToDoList</title>
</head>