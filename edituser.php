<?php
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel = "icon" href ="./img/oMEN ICON.jpg" type = "image/x-icon">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
</head>

<body class="body-edit bg-info">
  <div class="main-edituser container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card bg-secondary border-0">
          <div class="cardHeader-edituser card-header bg-dark text-white">
            <h2>Edit User
              <a href="index.php" class="btn btn-danger float-end mt-1">BACK</a>
            </h2>
          </div>
          <div class="cardBody-edituser card-body bg-secondary text-white">

            <?php
            if (isset($_GET['id'])) {

              $user_id = mysqli_real_escape_string($conn, $_GET['id']);
              $query = "SELECT * FROM users WHERE id='$user_id' ";
              $query_run = mysqli_query($conn, $query);

              if (mysqli_num_rows($query_run) > 0) {
                $user = mysqli_fetch_array($query_run);
            ?>

                <form action="code.php" method="POST" autocomplete="off" class="form-edituser" enctype="multipart/form-data">

                  <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                  <label for="name">Name: </label>
                  <input type="text" name="name" value="<?= $user['name']; ?>" class="form-control"> <br>
                  <label for="email">Email: </label>
                  <input required type="email" name="email" value="<?= $user['email']; ?>" class="form-control"> <br>
                  <label for="gender">Gender: </label>
                  <select class="form-control" name="gender">
                    <option value="Male" <?php if ($user["gender"] == "Male") echo "selected"; ?>>Male</option>
                    <option value="Female" <?php if ($user["gender"] == "Female") echo "selected"; ?>>Female</option>
                  </select> <br>
                  <label>Birthday: </label>
                  <input type="date" name="birthday" class="form-control mb-4" value="<?php echo is_object($user["birthday"]) ? $user["birthday"]->format("Y-m-d") : $user["birthday"] ?>">
                  <label>Address: </label>
                  <input type="text" name="address" value="<?= $user['address']; ?>" class="form-control"> <br>
                  <label>Images: </label>
                  <td><input name="image" type="file" id="image "class="form-control mb-3" accept=".jpg, .jpeg, .png" value="<?= $user['image']; ?>"><img src="<?= $user['image']; ?>" width="200px" height="200px">
                  <input type="hidden" name="old_image" value="<?= $user['image']; ?>"></td>
                  <br>
                  <button type="submit" name="edit_user" class="btn btn-primary mt-3">SAVE</button>
                </form>
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