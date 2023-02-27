<?php
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="./img/oMEN ICON.jpg" type="image/x-icon">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
</head>

<body class="body-edit bg-info">
  <div class="main-edituser container mt-5">

    <?php include('message.php'); ?>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-secondary border-0">
          <div class="cardHeader-viewuser card-header bg-dark text-white">
            <h2>View User
              <a href="index.php" class="btn btn-danger float-end mt-1">BACK</a>
            </h2>
          </div>
          <div class="cardBody-viewuser card-body bg-secondary text-white">

            <?php
            if (isset($_GET['id'])) {

              $user_id = mysqli_real_escape_string($conn, $_GET['id']);
              $query = "SELECT * FROM users WHERE id='$user_id' ";
              $query_run = mysqli_query($conn, $query);

              if (mysqli_num_rows($query_run) > 0) {
                $user = mysqli_fetch_array($query_run);
            ?>
                <div class="mb-3">
                  <label>Name: </label>
                  <p class="form-control">
                    <?= $user['name']; ?>
                  </p>
                </div>

                <div class="mb-3">
                  <label>Email: </label>
                  <p class="form-control">
                    <?= $user['email']; ?>
                  </p>
                </div>

                <div class="mb-3">
                  <label>Gender: </label>
                  <p class="form-control">
                    <?= $user['gender']; ?>
                  </p>
                </div>

                <div class="mb-3">
                  <label>Birthday: </label>
                  <p class="form-control">
                    <?= $user['birthday']; ?>
                  </p>
                </div>

                <div class="mb-3">
                  <label>Address: </label>
                  <p class="form-control">
                    <?= $user['address']; ?>
                  </p>
                </div>

                <div class="mb-3">
                  <label>Image: </label><br>
                  <p class="form-control">
                    <?= $user['image']; ?></p>
                  <img class="" src=<?= $user['image']; ?> width="200px" height="200px" accept=".jpg, .jpeg, .png">
                  </p>
                </div>


            <?php
              } else {
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