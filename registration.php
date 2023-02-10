<?php
require 'config.php';
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Userame or Email has already taken'); </script>";
  } else {
    if ($password == $confirmPassword) {
      $query = "INSERT INTO tb_user VALUES(null,'$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Your Account has been created'); </script>";
      header("Location: login.php");
    } else {
      echo
      "<script> alert('Password does not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
</head>

<body class="body-register bg-info">
  <div class="main-register container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card-register card border-0">
          <div class="card-header bg-secondary text-white">
            <h2>Registration</h2>
          </div>
          <div class="card-body bg-dark">
            <form class="form-register bg-dark text-white" action="" method="POST" autocomplete="off">
              <label for="name">Name: </label>
              <input type="text" name="name" required value="" placeholder=" Enter Name" class="form-control mb-3">
              <label for="username">Username: </label>
              <input type="text" name="username" required value="" placeholder=" Enter username" class="form-control mb-3">
              <label for="email">Email: </label>
              <input type="email" name="email" required value="" placeholder=" Enter Email" class="form-control mb-3">
              <label for="password">Password: </label>
              <input type="password" name="password" required value="" placeholder=" Enter Password" class="form-control mb-3">
              <label for="confirmPassword">Confirm Password: </label>
              <input type="password" name="confirmPassword" required value="" placeholder=" Verify Password" class="form-control mb-4">
              <button type="submit" name="submit" class="btn btn-primary">REGISTER</button>
              <div class="link-register mt-4 mb-2">
                Already have an account? <a href="login.php">Click Here!</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>