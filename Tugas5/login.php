<?php
session_start();
include 'connect_mysql.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query untuk memeriksa data login dari database
  $sql = "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);

  $id = mysqli_fetch_assoc($result)['id'];
  // Periksa jumlah baris yang terpengaruh
  if (mysqli_num_rows($result) > 0) {
    // Jika data login ditemukan, set session dan cookie
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $id;

    // Set cookie dengan masa berlaku 1 jam
    $cookie_name = "login_cookie";
    $cookie_value = $username;
    $cookie_expire = time() + (60 * 60); // 1 jam
    setcookie($cookie_name, $cookie_value, $cookie_expire);

    // Periksa apakah "Remember Me" dicentang
    if (isset($_POST['remember'])) {
      // Set cookie dengan masa berlaku 7 hari
      $cookie_name = "login_cookie";
      $cookie_value = $username;
      $cookie_expire = time() + (60 * 60 * 24 * 7); // 7 hari
      setcookie($cookie_name, $cookie_value, $cookie_expire);
    }
    // Redirect ke halaman setelah login
    header("Location: toDoList.php");
    exit();
  } else {
    // Jika data login tidak ditemukan
    echo "Username atau password tidak valid";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="gregoriusAlan" />
  <meta name="Nim" content="225314003" />
  <title>Login</title>
  <!-- Css -->
  <link rel="stylesheet" href="style.css" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="fotoLogin.jpeg" class="img-fluid" alt="Sample image" />
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <!--  -->
          <form method="POST" action="">
            <!-- Username input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="login-username">Username</label>
              <input type="text" id="login-username" class="form-control form-control-lg" name="username" value=""
                placeholder="Enter username" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="login-password">Password</label>
              <input type="password" id="login-password" class="form-control form-control-lg" name="password" value=""
                placeholder="Enter password" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" name="remember" value="1" id="login-remember" />
                <label class="form-check-label" for="login-remember"> Remember me </label>
              </div>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" name="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                  class="link-danger">Register</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">author @gregoriusAlan</div>
      <!-- Copyright -->
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>