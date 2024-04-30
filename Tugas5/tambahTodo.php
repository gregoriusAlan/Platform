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
        header("Location: toDoList.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Todo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input[type="text"],
        input[type="submit"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
            box-sizing: border-box; /* Menangani padding dan border dalam hitungan lebar */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #007bff;
            margin-top: 10px;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Tambah Todo</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Todo: <input type="text" name="todolist"><br>
        <input type="submit" value="Tambah">
    </form>
    <a href="todoList.php">Kembali ke Todo List</a>
    <a href="logout.php">Logout</a>
</body>
</html>

