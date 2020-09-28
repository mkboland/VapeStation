<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

include "admin-session.php"; //grabs config to connect to database

//session_start();

$error = ''; // define variable

if (isset($_POST['save'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $username = mysqli_real_escape_string($db,$_POST['username']); //strips slashes from the form
  $email = mysqli_real_escape_string($db,$_POST['email']); //strips slashes from the form
  $userlvl = mysqli_real_escape_string($db,$_POST['userlvl']); //strips slashes from the form

  $sql = "UPDATE users SET username = '$username', email = '$email', user_level = '$userlvl' WHERE id = '$id'";

  if (mysqli_query($db, $sql)) {
      header("location: ../users.php");
      $_SESSION['updated'] = 'Successfully updated user';
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
  }
}
elseif (isset($_POST['delete'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);

  $sql = "DELETE FROM users WHERE id = '$id'";

  if (mysqli_query($db, $sql)) {
      header("location: ../user-management.php");
      $_SESSION['deleted'] = 'Successfully deleted user';
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
  }
}
?>
