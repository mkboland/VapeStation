<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

include 'config.php';
session_start(); //starts session

$myusername = $_SESSION['login_user']; //gets usernmae from the logged in user

$sql = "SELECT * FROM users WHERE Email = '$myusername'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION['user_level'] = $row['user_level']; //gets user level
$_SESSION['user_name'] = $row['username']; //gets username

// if(!isset($_SESSION['login_user'])){ //if usernmae isn't set for session redirect to index
//   header("location:index.php");
//   die();
// }

if($_SESSION['user_level'] != 1){ //if user isn't admin don't allow them to access, redirect to index
  header("location:index.php");
  die();
}

// include 'head.php';
?>
