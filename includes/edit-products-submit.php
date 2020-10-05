<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL); //error reporting

  include 'admin-session.php';

    if (isset($_POST['save'])) {
      $productID = mysqli_real_escape_string($db, $_POST['product-id']);
      $productBrand = mysqli_real_escape_string($db,$_POST['product-brand']); //strips slashes from the form
      $productName = mysqli_real_escape_string($db,$_POST['product-name']); //strips slashes from the form
      $productDescription = mysqli_real_escape_string($db,$_POST['product-description']); //strips slashes from the form
      $productPrice = mysqli_real_escape_string($db, $_POST['product-price']);
      $productStock = mysqli_real_escape_string($db, $_POST['product-stock']);
      $productCategory = mysqli_real_escape_string($db, $_POST['product-category']);

      $sql = "UPDATE products SET product_brand = '$productBrand', product_name = '$productName', product_description = '$productDescription', product_price = '$productPrice', product_stock = '$productStock', product_category = '$productCategory' WHERE product_id = '$productID'";

      if (mysqli_query($db, $sql)) {
          header("location: ../edit-products.php");
          $_SESSION['updated'] = 'Successfully updated product';
      } else {
        header("location: ../edit-products.php");
        $_SESSION['error'] = "Error: ". $sql . "<br>" . mysqli_error($db);
      }
    }
    elseif (isset($_POST['delete'])) {
      $productID = mysqli_real_escape_string($db, $_POST['product-id']);

      $sql = "DELETE FROM products WHERE product_id = '$productID'";

      if (mysqli_query($db, $sql)) {
          header("location: ../edit-products.php");
          $_SESSION['deleted'] = 'Successfully deleted product';
      } else {
        header("location: ../edit-products.php");
        $_SESSION['error'] = "Error: ". $sql . "<br>" . mysqli_error($db);
      }
    }

 ?>
