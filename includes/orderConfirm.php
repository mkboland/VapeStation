<?php
  session_start();

  $_SESSION['paymentName'] = $_GET['name'];
  $_SESSION['paymentEmail'] = $_GET['email'];
  $_SESSION['paymentID'] = $_GET['id'];

  if(isset($_SESSION['paymentName']) && isset($_SESSION['paymentEmail']) && isset($_SESSION['paymentID']) ) {
    unset($_SESSION["cart"]);
    header("Location: ../thankyou.php");
  } else {
    unset($_SESSION["cart"]);
    header("Location: ../basket.php");
  }
?>
