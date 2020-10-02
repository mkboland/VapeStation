<?php
  include 'admin-session.php';

  $error = ''; // define variable

  if (isset($_POST['add-product'])) {
    $productBrand = mysqli_real_escape_string($db,$_POST['product-brand']); //strips slashes from the form
    $productName = mysqli_real_escape_string($db,$_POST['product-name']); //strips slashes from the form
    $productDescription = mysqli_real_escape_string($db,$_POST['product-description']); //strips slashes from the form
    $productPrice = mysqli_real_escape_string($db, $_POST['product-price']);

    $productImage = $_FILES['product-image']['name'];

    echo $productBrand, $productName, $productDescription, $productPrice;

  }else{

  }

 ?>
