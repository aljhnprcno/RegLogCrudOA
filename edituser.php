<?php
// require 'config.php';
// $id = $_GET["id"];
// $rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $id"));



// if(isset($_POST["submit-edit"])) {
//   // date_default_timezone_set('Asia/Manila');

//   $id = $_POST["id"];
//   $name = $_POST["name"];
//   $email = $_POST["email"];
//   $gender = $_POST["gender"];
//   $birthday = $_POST["birthday"];
//   // $today = date("Y-m-d H:i:s");

//   $sql = "SELECT * FROM users WHERE email='$email'";
//   $result=mysqli_query($conn,$sql);
//   $present=mysqli_num_rows($result);
//   if($present>0) {
//     $_SESSION['email_alert']='1';
//     echo
//     "<script> alert('Email has already taken'); </script>";
//   // } else if ($birthday >= $today) {
//   //   echo
//   //   "<script> alert ('Birthdate Invalid'); </script>";
//   } else {
//     $query = "UPDATE users SET name = '$name', email = '$email', gender = '$gender', birthday = '$birthday' WHERE id = $id";
//     mysqli_query($conn, $query);
//     echo
//     "<script> alert('Successfully Updated'); </script>";
//   };
// }
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
</head>

<body>
  <div class="main-edituser container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card bg-secondary">
          <div class="card-header bg-dark text-white">
            <h2>Edit User
              <a href="index.php" class="btn btn-danger float-end">BACK</a>
            </h2>
          </div>
          <div class="card-body bg-secondary text-white">

          <?php
          if(isset($_GET['id'])){
            
            $user_id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM users WHERE id='$user_id' ";
            $query_run = mysqli_query($conn, $query);

              if(mysqli_num_rows($query_run) > 0){
              $user = mysqli_fetch_array($query_run);
            ?>

            <form action="code.php" method="POST" autocomplete="off" class="form-edituser">

              <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
              <label for="name">Name: </label>
              <input type="text" name="name" value="<?=$user['name'];?>" class="form-control"> <br>
              <label for="email">Email: </label>
              <input type="email" name="email" value="<?=$user['email'];?>" class="form-control"> <br>
              <label for="gender">Gender: </label>
              <select class="form-control" name="gender">
                <option value="Male" <?php if ($user["gender"] == "Male") echo "selected"; ?>>Male</option>
                <option value="Female" <?php if ($user["gender"] == "Female") echo "selected"; ?>>Female</option>
              </select> <br>
              <label>Birthday: </label>
              <input type="text" name="birthday" class="form-control" placeholder="<?=$user['birthday']; ?>" onfocus="(this.type='date')" onblur="(this.type='date')">
              <br>
              <br>
              <button type="submit" name="edit_user" class="btn btn-primary">SAVE</button>
            </form>
        <?php
        }else{
          echo "<h4>No Such Id Found</h4>";
        }
    }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>