<?php
  session_start();
  include "config.php";

  $productID = array_column($_SESSION['cart'], 'product-id'); //takes all the product id and makes them a single array from multi
  $quanity = array_column($_SESSION['cart'], 'quanity'); // takes all the quanity and makes them a single array
  $update = array_combine($productID, $quanity);

  $_SESSION['paymentName'] = $_GET['name'];
  $_SESSION['paymentEmail'] = $_GET['email'];
  $_SESSION['paymentID'] = $_GET['id'];

  if(isset($_SESSION['paymentName']) && isset($_SESSION['paymentEmail']) && isset($_SESSION['paymentID']) ) {
    foreach ($update as $productIDupdate => $quanityupdate) {
      $sql = "UPDATE `products` SET product_stock=product_stock-$quanityupdate WHERE product_id = $productIDupdate";
      mysqli_query($db, $sql);
    }

    unset($_SESSION["cart"]);
    header("Location: ../thankyou.php");
  } else {
    unset($_SESSION["cart"]);
    header("Location: ../basket.php");
  }
?>
