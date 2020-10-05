<?php
include "includes/admin-session.php";
include "includes/head.php";
?> <!-- Calls the header -->


 <head>
   <title>Vape Station - Admin Dashboard</title>
 </head>

 <body class="">

   <?php include "includes/nav.php"; ?>

   <div class="container">
    <form action="includes/add-product-submit.php" method="post" enctype="multipart/form-data">

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="product-brand">Product Brand</label>
          <input type="text" class="form-control" name="product-brand" placeholder="Product Brand" required>
        </div>

        <div class="form-group col-md-6">
          <label for="product-name">Product Name</label>
          <input type="text" class="form-control" name="product-name" placeholder="Product Name" required>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-5">
            <label for="product-description">Product Description</label>
            <textarea type="text" class="form-control" name="product-description" placeholder="Write description in here..." required></textarea>
          </div>

          <div class="form-group col-md-3">
            <label for="product-category">Product Category</label>
            <select name="product-category" class="form-control">
              <option selected>Choose...</option>
              <option>Juices</option>
              <option>Mods</option>
            </select>
          </div>

        <div class="form-group col-md-2">
          <label for="product-price">Product Price £</label>
          <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" name="product-price" placeholder="0.00" required>
        </div>

        <div class="form-group col-md-2">
          <label for="product-stock">Product Stock Level</label>
          <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" name="product-stock" placeholder="0.00" required>
        </div>
      </div>

      <div class="input-group is-invalid">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="product-image" required>
          <label class="custom-file-label" for="product-image" required>Choose Product Image...</label>
        </div>
      </div>

      <button type="submit" name="add-product" value="add-product" class="btn btn-primary">Add Product</button>

      <?php
      $added = $_SESSION['added'];
      $error = $_SESSION['error'];

      if(isset($_SESSION['added'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              '.$added.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
        unset($_SESSION['added']);
      }
      elseif(isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              '.$error.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
        unset($_SESSION['error']);
      }
      ?>

    </form>
   </div>


 <?php include "includes/footer.php"; ?>
