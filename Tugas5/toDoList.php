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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px;
        }

        li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        form {
            margin: 0;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin: 20px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Todo List</h1>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <li>
                <?php echo $row['toDoList']; ?> - <?php echo $row['status']; ?>
                <form method="post" action="toDoList.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="selesai" value="Selesai">
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
    <a href="tambahTodo.php">Tambah Todo</a>
    <a href="logout.php">Logout</a>

    <?php
    // Memproses penandaan tugas sebagai selesai
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selesai'])) {
        $id = $_POST['id'];
        
        // Query hapus todo dari database
        $sql_delete = "DELETE FROM todo WHERE id = $id";
        
        if (mysqli_query($conn, $sql_delete)) {
            // Refresh halaman
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>

