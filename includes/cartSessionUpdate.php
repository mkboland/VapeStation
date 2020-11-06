<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); //error reporting

 include "session.php";

  if (isset($_POST['update'])) {
    $productID = mysqli_real_escape_string($db, $_POST['product-id']);
    $productPrice = mysqli_real_escape_string($db,$_POST['product-price']); //strips slashes from the form
    $quanity = mysqli_real_escape_string($db,$_POST['quanity']); //strips slashes from the form

    $key = array_search($productID, array_column($_SESSION['cart'], 'product-id'));

    if (array_key_exists($key, $_SESSION['cart'])) {
      $productPrice = $productPrice * $quanity;

      $_SESSION['cart'][$key]['quanity'] = $quanity;
      $_SESSION['cart'][$key]['product-price'] = $productPrice;

      header("location:../basket.php"); //redirects to main webpage
    } else {
      unset($_SESSION['cart']); //unsets the key therfore deleting that item
      header("location:../basket.php"); //redirects to main webpage
    }
  } elseif(isset($_POST['delete'])) { //this is to remove products one at a time from basket
    $productID = mysqli_real_escape_string($db, $_POST['product-id']); //gets product code

    $key = array_search($productID, array_column($_SESSION['cart'], 'product-id')); //creates a key by finding the product code within array

    if (array_key_exists($key, $_SESSION['cart'])) { //checks for key
      unset($_SESSION['cart'][$key]); //unsets the key therfore deleting that item
      header("location:../basket.php"); //redirects to main webpage
    } else {
      unset($_SESSION['cart']); //if there is an error or is last item will destory the cart completely
      header("location:../basket.php"); //redirects to main webpage
    }
  } else {
    echo "There was an Error";
  }

?>
