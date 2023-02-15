<?php
session_start();
require 'config.php';
date_default_timezone_set('Asia/Manila');

if (!empty($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
} else {
  header("Location: login.php");
};

// $pic = mysqli_query($conn,"SELECT * FROM users");
// while($row = mysqli_fetch_array($pci)){
  
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel = "icon" href ="./img/oMEN ICON.jpg" type = "image/x-icon">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
</head>

<body class="body-index bg-info text-white">
  <center class="mt-5">
    <h1>Welcome
      <?php
      echo $row["name"];
      ?>
      !!!
    </h1>
  </center>
  <br>
  <div class="container mt-4 dark">

    <?php include('message.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card-index card border-0">
          <div class="cardHeader-index card-header bg-dark text-white">
            <h2>Data Table
              <a href="adduser.php" class="btn btn-success float-right mt-1">Add User</a>
            </h2>
          </div>
          <div class="cardBody-index card-body bg-secondary">
            <table class="table table-striped table-bordered table-dark mx-auto" width=100%>
              <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Email</th>
                <th class="text-center" scope="col">Gender</th>
                <th class="text-center" scope="col">Birthday</th>
                <th class="text-center" scope="col">Address</th>
                <th class="text-center" scope="col">Image</th>
                <th class="text-center" scope="col">Date Created</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
              <?php
              $query = "SELECT * FROM users";
              $query_run = mysqli_query($conn, $query);
              $i = 1;
              ?>

              <?php
              foreach ($query_run as $user) :
              ?>

                <tr>
                  <td><?php echo $i++; ?></td>
                  <td class="text-center"><?= $user['name']; ?></td>
                  <td class="text-center"><?= $user['email']; ?></td>
                  <td class="text-center"><?= $user['gender']; ?></td>
                  <td class="text-center"><?= $user['birthday']; ?></td>
                  <td class="text-center"><?= $user['address']; ?></td>
                  <td class="text-center"><img src=<?= $user['image']; ?> width="50px" height="50px" accept=".jpg, .jpeg, .png"></td>
                  <td class="text-center"><?= $user ['created_at']; ?></td>
                  <td class="text-center">
                    <a href="viewuser.php?id=<?= $user['id']; ?>>" class="btn btn-success btn-sm mr-1">VIEW</a>
                    <a href="edituser.php?id=<?= $user['id']; ?>>" class="btn btn-primary btn-sm mr-1">EDIT</a>
                    <form action="code.php" method="POST" class="d-inline">
                      <button type="submit" name="delete_user" value="<?= $user['id']; ?>" class="btn btn-danger btn-sm ">DELETE
                      </button>
                    </form>
                  </td>
                </tr>
              <?php
              endforeach;
              ?>
            </table>
            <div class="link-index2">
              <a href="logout.php" class="btn btn-danger btn-sm">LOGOUT</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>