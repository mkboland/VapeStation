<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

include 'config.php';
session_start(); //starts session

if ($_SESSION['user_level'] != 1) { //if the session isn't already admin set to user, else set to admin
  $_SESSION['user_level'] = 0; //user level
} else {
  $_SESSION['user_level'] = 1; //admin level
}

?>
