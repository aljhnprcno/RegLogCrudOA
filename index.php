<?php
  session_start();
  require 'config.php';

  if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

} else {
    header("Location: login.php");
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8">
  <title>Index</title>
</head>

<body class="body-index">
  <center class="mt-5">  
    <h1>Welcome
      <?php
      echo $row["name"];
      ?>
    !!!
    </h1>
  </center>
<br>
<br>
  <div class="container mt-4 dark">

    <?php include('message.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <div class="card-header bg-dark text-white">
          <h2>Data Table
            <a href="adduser.php" class="btn btn-success float-right">Add Students</a>
          </h2>
        </div>
        <div class="card-body bg-secondary">
          <table class="table table-dark">
              <tr>
                <td scope="col">#</td>
                <td scope="col">Name</td>
                <td scope="col">Email</td>
                <td scope="col">Gender</td>
                <td scope="col">Birthday</td>
                <td scope="col">Date Created</td>
                <td scope="col">Action</td>
              </tr>
              <?php 
                $query = "SELECT * FROM users";
                $query_run = mysqli_query($conn, $query);
                $i = 1;
              ?>

              <?php 
                  foreach($query_run as $user) :
              ?>

              <tr>
                <td><?php echo $i++; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['gender']; ?></td>
                <td><?= $user['birthday']; ?></td>
                <td> </td>
                <td>
                  <a href="viewuser.php?id=<?= $user['id'];?>>" class="btn btn-success btn-sm">VIEW</a>
                  <a href="edituser.php?id=<?= $user['id'];?>>" class="btn btn-primary btn-sm">EDIT</a>
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


</body>

</html>