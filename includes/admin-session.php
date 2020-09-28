<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

include 'config.php';
session_start(); //starts session

$myusername = $_SESSION['login_user'];

$sql = "SELECT * FROM users WHERE Email = '$myusername'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION['user_level'] = $row['user_level'];
$_SESSION['user_name'] = $row['username'];

// if(!isset($_SESSION['login_user'])){ //if usernmae isn't set for session redirect to index
//   header("location:index.php");
//   die();
// }

if($_SESSION['user_level'] != 1){
  header("location:index.php");
  die();
}

// include 'head.php';
?>
