<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

include 'config.php';
session_start(); //starts session

if(!isset($_SESSION['paymentName']) && !isset($_SESSION['paymentEmail']) && !isset($_SESSION['paymentID'])){
   header("Location: ../index.php");
}

?>
