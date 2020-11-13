<?php
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL); //error reporting

  include 'admin-session.php';

  if (isset($_POST['add-product'])) {
    $productBrand = mysqli_real_escape_string($db,$_POST['product-brand']); //strips slashes from the form
    $productName = mysqli_real_escape_string($db,$_POST['product-name']); //strips slashes from the form
    $productDescription = mysqli_real_escape_string($db,$_POST['product-description']); //strips slashes from the form
    $productPrice = mysqli_real_escape_string($db, $_POST['product-price']);
    $productStock = mysqli_real_escape_string($db, $_POST['product-stock']);
    $productCategory = mysqli_real_escape_string($db, $_POST['product-category']);
    $productImage = mysqli_real_escape_string($db, $_FILES['product-image']['name']);

    $target = "/Users/michaelboland/Documents/Website Development/University/VapeStation/productImages/".basename($productImage);

    $sql = "INSERT INTO products (product_brand, product_name, product_description, product_price, product_stock, product_image, product_category) VALUES ('$productBrand', '$productName', '$productDescription', '$productPrice', '$productStock', '$productImage', '$productCategory')";

    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['product-image']['tmp_name'], $target)) {
      header("location: ../add-products.php");
      $_SESSION['added'] = 'Product successfully added.';
    	}else{
        header("location: ../add-products.php");
        $_SESSION['error'] = 'There was an error adding the product to the stock file.';
    	}
    }

 ?>
