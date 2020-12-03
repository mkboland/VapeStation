<?php
   session_start();

   if (isset($_SESSION['user_level'])) {
     unset($_SESSION["cart"]); //removes all items from cart
     header("Location: ../basket.php"); //takes back to basket
   }else {
     session_destroy();
     header("Location: ../basket.php");
   }
?>
