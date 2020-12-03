<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

 include "session.php";

  if (isset($_POST['add'])) {
    $productID = mysqli_real_escape_string($db, $_POST['product-id']); //gets all info from add button
    $productBrand = mysqli_real_escape_string($db, $_POST['product-brand']);
    $productName = mysqli_real_escape_string($db, $_POST['product-name']);
    $productPrice = mysqli_real_escape_string($db, $_POST['product-price']);
    $originalPrice = mysqli_real_escape_string($db, $_POST['original-price']);
    $productImage = mysqli_real_escape_string($db, $_POST['product-image']);

    $sql = "SELECT * FROM products WHERE product_id= $productID"; //selects item from db
    $result = mysqli_query($db, $sql); //runs db command

    if (isset($db,$_POST['quanity'])) { //if quanity is set
      $quanity = mysqli_real_escape_string($db,$_POST['quanity']); //use this quanity
    } else {
      $quanity = '1'; //else set to one == only pressing add button
    }

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
        $dataQuanity = $row['product_stock']; //gets database quanity
        if ($dataQuanity < $quanity) { //doesn't let you add to basket if there isn't enough stock of the item
          $_SESSION['error'] = "Error: There isn't enough stock of this item.";
          header("location:../basket.php"); //redirects to main webpage
          die(); //to stop script running
        }
      }
    } else {
      echo "Product doesn't exist";
    }

    $key = array_search($productID, array_column($_SESSION['cart'], 'product-id'));//creates a key of the product being added to basket

    if (array_key_exists($key, $_SESSION['cart'])) { //if item is already in basket
      $arrayQuanity = $_SESSION['cart'][$key]['quanity']; //gets quanity of what is already in there

      $quanity = $quanity + $arrayQuanity; //adds new quanity to what is already in there

      if ($dataQuanity < $quanity) {
        $_SESSION['error'] = "Error: There isn't enough stock of this item."; //doesn't let it update if there isn't stock
        header("location:../basket.php"); //redirects to main webpage
      } else {
        $productPrice = $originalPrice * $quanity; //sets product price

        $_SESSION['cart'][$key]['quanity'] = $quanity; //updates the array
        $_SESSION['cart'][$key]['product-price'] = $productPrice;

        header("location:../basket.php"); //redirects to main webpage
      }
    } else {
      $_SESSION['cart'][] = array('product-id' => $productID, 'product-brand' => $productBrand, 'product-name' => $productName, 'product-price' => $productPrice, 'original-price' => $originalPrice, 'quanity' => $quanity, 'product-image' => $productImage); //adds item to basket

      header("location:../basket.php"); //redirects to main webpage
    }
  } else {
    echo "There was an Error";
  }

?>
