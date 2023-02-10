<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add User</title>
</head>

<body>
<div class="main-adduser container mt-5">
  <div class="col-md-12">
    <div class="card bg-secondary">
        <div class="card-header bg-dark text-white">
          <h2>Add User
            <a href="index.php" class="btn btn-danger float-end">BACK</a>
          </h2>
        </div>
      <br>
      <div class="card-body bg-secondary text-white">
        <form action="code.php" method="POST" autocomplete="off" class="form-adduser">

          <div class="mb-3">
            <label for="name">Name: </label>
            <input required name="name" type="text" id="name" value="" placeholder="Enter Name" class="form-control">
          </div>
          
          <div class="mb-3">
            <label for="email">Email: </label>
            <input required name="email" type="email" id="email" value="" placeholder="Enter Email" class="form-control">
          </div>


          <div class="mb-3">
            <label for="gender">Gender: </label>
              <select required name="gender" id="gender" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
          </div>
          
          <div class="mb-3">
            <label>Birthday: </label>
            <input required name="birthday" type="date" id="birthday" class="form-control">
          </div>
          
          <div class="mb-3">
            <button type="submit" name="save_user" class="btn btn-primary">ADD</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


