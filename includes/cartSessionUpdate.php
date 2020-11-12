<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); //error reporting

 include "session.php";

  if (isset($_POST['update'])) {
    $productID = mysqli_real_escape_string($db, $_POST['product-id']);
    $originalPrice = mysqli_real_escape_string($db, $_POST['original-price']);
    $quanity = mysqli_real_escape_string($db,$_POST['quanity']); //strips slashes from the form

    $sql = "SELECT * FROM products WHERE product_id= $productID";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
        $dataQuanity = $row['product_stock']; //gets the stock quanity within the database
      }
    } else {
      echo "Product doesn't exist";
    }

    $key = array_search($productID, array_column($_SESSION['cart'], 'product-id'));

    if (array_key_exists($key, $_SESSION['cart'])) {
      $productPrice = $originalPrice * $quanity;

      if ($dataQuanity < $quanity) { //if the quanity of the database is less than the wanted quanity
        $_SESSION['error'] = "Error: There isn't enough stock of this item.";
        header("location:../basket.php"); //redirects to main webpage
      } else {
        $_SESSION['cart'][$key]['quanity'] = $quanity;
        $_SESSION['cart'][$key]['product-price'] = $productPrice;

        header("location:../basket.php"); //redirects to main webpage
      }
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
