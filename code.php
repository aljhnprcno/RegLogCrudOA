<?php
session_start();
require 'config.php';

if(isset($_POST['save_user']))
{
  date_default_timezone_set('Asia/Manila');


  $name = $_POST['name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];
  $address = $_POST['address'];

  // Start of upload image to database
  $image = $_FILES['image'];
  $img_loc = $_FILES['image']['tmp_name'];
  $img_name = $_FILES['image']['name'];
  $img_des = "img/".$img_name;
  move_uploaded_file($img_loc,'img/'.$img_name); //'img/' - folder on my project
  // End of upload image to database

  if ($name == "") {
    echo
      "<script> alert('Name is Required'); </script>
        <a href='adduser.php'>Return to Add user</a><br>";

    return false;

  } else if ($email == "") {
    echo
      "<script> alert('Email is Required'); </script>
      <a href='adduser.php'>Return to Add user</a><br>";

    return false;

  } else  if ($birthday == "") {
    echo
      "<script> alert('Birthday is Required'); </script>
      <a href='adduser.php'>Return to Add user</a><br>";

    return false;
  };


  //g:i:s - 12 hour format, H:i:s - 24 hour format
  // m-d-Y - Month/Date/Year format, Y-m-d - Year/Month/Date
  $today = date("Y-m-d g:i:s"); 
  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");


  if (mysqli_num_rows($duplicate) > 0) {

    $_SESSION['message'] = "Email Already Exists";
    header("Location: index.php");
    exit(0);

  } else if($birthday >= $today) {

    $_SESSION['message'] = "Birthdate Invalid";
    header("Location: index.php");
    exit(0);

  } else {

    $query = "INSERT INTO users VALUES(null,'$name','$email','$gender','$birthday','$address', '$img_des')";
    mysqli_query($conn, $query);
    $_SESSION['message'] = "User Created Successfully";
    header("Location: index.php");
    exit(0);

  };

}

if(isset($_POST['edit_user']))
{
  date_default_timezone_set('Asia/Manila');

  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];
  $address = $_POST['address'];


  // Start of upload image to database
  $image = $_FILES['image'];
  $img_loc = $_FILES['image']['tmp_name'];
  $img_name = $_FILES['image']['name'];
  $img_des = "img/".$img_name;
  move_uploaded_file($img_loc,'img/'.$img_name); //'img/' - folder on my project
  // End of upload image to database


  $today = date("Y-m-d H:i:s");
  $duplicate_email = mysqli_query($conn, "SELECT * FROM users WHERE id != $user_id AND email = '$email'");
  $data = mysqli_fetch_array($duplicate_email);



  if (mysqli_num_rows($duplicate_email) > 0) {

    $_SESSION['message'] = "Email Already Exists";
    header("Location: index.php");
    exit(0);

  } else if($birthday >= $today) {

    $_SESSION['message'] = "Birthdate Invalid";
    header("Location: index.php");
    exit(0);

  } else {

    $query = "UPDATE users SET name='$name', email='$email', gender='$gender', birthday='$birthday', address='$address', image='$img_des' WHERE id='$user_id' ";
    mysqli_query($conn,$query);
    $_SESSION['message'] = "User Updated Successfully";
    header("Location: index.php");
    exit(0);
  };
}

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

?>