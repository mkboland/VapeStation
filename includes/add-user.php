<?php
include 'admin-session.php';

//session_start();

$error = ''; // define variable

if (isset($_POST['save'])) {
  $username = mysqli_real_escape_string($db,$_POST['username']); //strips slashes from the form
  $email = mysqli_real_escape_string($db,$_POST['email']); //strips slashes from the form
  $inputpassword = mysqli_real_escape_string($db,$_POST['password']); //strips slashes from the form
  $userlvl = mysqli_real_escape_string($db,$_POST['userlvl']); //strips slashes from the form

  $hashedpassword = password_hash($inputpassword, PASSWORD_DEFAULT); //hashes password

  $sql = "INSERT INTO users (id, username, email, password, user_level) VALUES (NULL, '$username', '$email', '$hashedpassword', '$userlvl')"; //insets into database new user

  if (mysqli_query($db, $sql)) { //if okay
      header("location: ../user-management.php");
      $_SESSION['added'] = 'Successfully added user'; //alert success
  } else {
      header("location: ../user-management.php"); //else there was an error
      $_SESSION['error'] = 'Error. User already exists.'; //alert on next page
  }
}
?>
