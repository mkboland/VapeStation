<?php
   session_start();

   if (isset($_SESSION['user_level'])) {
     unset($_SESSION["cart"]);
     header("Location: ../basket.php");
   }else {
     session_destroy();
     header("Location: ../basket.php");
   }
?>
