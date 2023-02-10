<?php
require 'config.php';
    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }
    if(isset($_POST["submit"])){
        $usernameEmail = $_POST["usernameEmail"];
        $password = $_POST["password"];
        $result = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$usernameEmail' OR email = '$usernameEmail'");
        $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) > 0){
                if($password == $row["password"]){
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
        <title>Login</title>
    </head>

    <body class="body-login">
        <div class="main-login">
            <h2>Login</h2>
            <form class="form-login" action="" method="post" autocomplete="off">
                <label for="usernameEmail">Username or Email: </label>
                <input type="text" name="usernameEmail" id="usernameEmail" required value="" placeholder=" Enter User"> <br>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required value="" placeholder=" Enter Password"> 
                <br> <br>
                <button type="submit" name="submit">LOGIN</button>
            </form>
            <br>
            <div class="link-login">
                Dont have an account yet? <a href="registration.php">Click Here!</a>
            </div>
        </div>


        <!-- js script -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    </body>
</html>