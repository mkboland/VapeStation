<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); //error reporting

 include "session.php";

  if (isset($_POST['add'])) {
    $productID = mysqli_real_escape_string($db, $_POST['product-id']);
    $productBrand = mysqli_real_escape_string($db, $_POST['product-brand']);
    $productName = mysqli_real_escape_string($db, $_POST['product-name']);
    $productPrice = mysqli_real_escape_string($db, $_POST['product-price']);
    $productImage = mysqli_real_escape_string($db, $_POST['product-image']);

    if (isset($db,$_POST['quanity'])) {
      $quanity = mysqli_real_escape_string($db,$_POST['quanity']); //strips slashes from the form
    } else {
      $quanity = '1';
    }

    $key = array_search($productID, array_column($_SESSION['cart'], 'product-id'));

    if (array_key_exists($key, $_SESSION['cart'])) {
      $arrayQuanity = $_SESSION['cart'][$key]['quanity'];

      $quanity = $quanity + $arrayQuanity;
      $productPrice = $productPrice * $quanity;

      $_SESSION['cart'][$key]['quanity'] = $quanity;
      $_SESSION['cart'][$key]['product-price'] = $productPrice;

      header("location:../basket.php"); //redirects to main webpage
    } else {
      $_SESSION['cart'][] = array('product-id' => $productID, 'product-brand' => $productBrand, 'product-name' => $productName, 'product-price' => $productPrice, 'quanity' => $quanity, 'product-image' => $productImage);

      header("location:../basket.php"); //redirects to main webpage
    }
  } else {
    echo "There was an Error";
  }

?>
