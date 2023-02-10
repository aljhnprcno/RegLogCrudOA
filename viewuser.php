<?php
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
              <div class="mb-3">
                <label>Name: </label>
                <p class="form-control">
                  <?=$user['name']; ?>
                </p>
              </div>

              <div class="mb-3">
                <label>Email: </label>
                <p class="form-control">
                  <?=$user['email']; ?>
                </p>
              </div>

              <div class="mb-3">
                <label>Gender: </label>
                <p class="form-control">
                  <?=$user['gender']; ?>
                </p>
              </div>

              <div class="mb-3">
                <label>Birthday: </label>
                <p class="form-control">
                  <?=$user['birthday']; ?>
                </p>
              </div>

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