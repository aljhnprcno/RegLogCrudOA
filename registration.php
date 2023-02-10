<?php 
require 'config.php';
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
            if(mysqli_num_rows($duplicate) > 0){
                echo 
                "<script> alert('Userame or Email has already taken'); </script>";
            } else {
                if($password == $confirmPassword){
                    $query = "INSERT INTO tb_user VALUES(null,'$name','$username','$email','$password')";
                    mysqli_query($conn,$query);
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
        <title>Registration</title>
    </head>

    <body class="body-register">
        <div class="main-register">
            <h2>Registration</h2>
            <form class="form-register" action="" method="post" autocomplete="off">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required value="" placeholder=" Enter Name"> <br>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" required value="" placeholder=" Enter username"> <br>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required value="" placeholder=" Enter Email"> <br>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required value="" placeholder=" Enter Password"> <br>
                <label for="confirmPassword">Confirm Password: </label>
                <input type="password" name="confirmPassword" id="confirmPassword" required value="" placeholder=" Verify Password"> <br> <br>
                <button type="submit" name="submit">REGISTER</button>
            </form>
            <br>
            <div class="link-register">
                Already have an account? <a href="login.php">Click Here!</a>
            </div>
        </div>
    </body>
</html>