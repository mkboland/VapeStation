<?php
$sql = "SELECT * FROM products WHERE product_category = 'Mods' ORDER BY product_brand, product_name"; //gets all products with that category
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)){
    echo '<a href="product-page.php?productId='.$row['product_id'].'">
      <div class="card mb-4">
        <img class="card-img-top" src="productImages/'.$row['product_image'].'" alt="Product Image">
        <div class="card-body">
          <h5 class="card-title">'.$row['product_brand'].'</h5>
          <h6 class="card-title">'.$row['product_name'].'</h6>
           <span class="card-text">£'.$row['product_price'].'</span>

           <form action="includes/cartSession.php" method="post" enctype="multipart/form-data">

            <input type="text" class="hide" id="product-id" name="product-id" value="'.$row['product_id'].'">
            <input type="text" class="hide" id="product-brand" name="product-brand" value="'.$row['product_brand'].'">
            <input type="text" class="hide" id="product-name" name="product-name" value="'.$row['product_name'].'">
            <input type="text" class="hide" id="product-price" name="product-price" value="'.$row['product_price'].'">
            <input type="text" class="hide" id="original-price" name="original-price" value="'.$row['product_price'].'">
            <input type="text" class="hide" id="product-image" name="product-image" value="'.$row['product_image'].'">

            <button type="submit" class="btn btn-primary" name="add" value="add">Add to Basket</button>

           </form>

         </div>
      </div>
    </a>';
  }
} else {
  echo '<a href="#">
    <div class="card mb-4">
      <img class="card-img-top" src="https://placehold.it/280x140/abc" alt="Product Image">
      <div class="card-body">
        <h5 class="card-title">No Products Found</h5>
         <p class="card-text">No Description Found</p>
         <a href="#2" class="btn btn-primary">Add To Basket</a>
       </div>
    </div>
  </a>';
}
?>
