<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

include "admin-session.php"; //grabs config to connect to database

//session_start();

$error = ''; // define variable

if (isset($_POST['save'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']); //gets id and strips slashes
  $username = mysqli_real_escape_string($db,$_POST['username']); //strips slashes from the form
  $email = mysqli_real_escape_string($db,$_POST['email']); //strips slashes from the form
  $userlvl = mysqli_real_escape_string($db,$_POST['userlvl']); //strips slashes from the form

  $sql = "UPDATE users SET username = '$username', email = '$email', user_level = '$userlvl' WHERE id = '$id'"; //updates users

  if (mysqli_query($db, $sql)) {
      header("location: ../user-management.php"); //redirect
      $_SESSION['updated'] = 'Successfully updated user'; //success alert
  } else {
    header("location: ../user-management.php"); //redirect
    $_SESSION['error'] = "Error: ". $sql . "<br>" . mysqli_error($db); //error alert with error
  }
}
elseif (isset($_POST['delete'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);

  $sql = "DELETE FROM users WHERE id = '$id'"; //deelets user

  if (mysqli_query($db, $sql)) {
      header("location: ../user-management.php"); //redirect
      $_SESSION['deleted'] = 'Successfully deleted user'; //deleted alert
  } else {
    header("location: ../user-management.php"); //redirect
    $_SESSION['error'] = "Error: ". $sql . "<br>" . mysqli_error($db); //error alert with error
  }
}
?>
