<?php
require './connect_mysql.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // sql to delete a record
    $sql = "DELETE FROM `tb_todolist` WHERE id='$id'";
    header('location:toDoList.php');