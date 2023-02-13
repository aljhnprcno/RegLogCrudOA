<?php
session_start();
require 'config.php';
if (!empty($_SESSION["id"])) {
  header("Location: index.php");
}
if (isset($_POST["submit"])) {
  $usernameEmail = $_POST["usernameEmail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameEmail' OR email = '$usernameEmail'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    if ($password == $row["password"]) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    } else {
      echo
      "<script> alert('Password Incorrect'); </script>";
    }
  } else {
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body class="body-login bg-info">
  <div class="main-login container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0">
          <div class="cardHeader-login card-header bg-secondary text-white">
            <h2>LOGIN</h2>
          </div>
          <div class="cardBody-login card-body bg-dark">
          <form class="form-login bg-dark text-white" method="POST" autocomplete="off">
            <div class="card-body">
                <label for="usernameEmail">Username or Email:</label>
                <input required type="text" name="usernameEmail" class="form-control mb-3" placeholder="Enter Username or Email">
              <div class="form-group">
                <label for="password">Password:</label>
                <input required name="password" type="password" class="form-control mb-4" placeholder="Enter Password">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
              <div class="link-login mt-3">
                Dont have an account yet? <a href="registration.php">Click Here!</a>
            </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>