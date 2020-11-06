<?php
$productID = $_GET['productId'];

$sql = "SELECT * FROM products WHERE product_id = '$productID'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)){
    echo '<img class="image" alt="" src="productImages/'.$row['product_image'].'"></img>
    <div class="right-align">
      <h2>'.$row['product_brand'].'</h2>
      <h3>'.$row['product_name'].'</h3>
      <span class="price">£'.$row['product_price'].'</span>
      <form action="includes/cartSession.php" method="post" enctype="multipart/form-data">
        <span class="text">Quanity</span>

        <input type="text" style="display:none;" id="product-id" name="product-id" value="'.$row['product_id'].'">
        <input type="number" name="quanity" id="quanity" value="1" class="quanity">
        <button type="submit" class="btn btn-primary" name="add" value="add">Add to Basket</button>

        <input type="text" style="display:none" id="product-brand" name="product-brand" value="'.$row['product_brand'].'">
        <input type="text" style="display:none" id="product-name" name="product-name" value="'.$row['product_name'].'">
        <input type="text" style="display:none" id="product-price" name="product-price" value="'.$row['product_price'].'">
        <input type="text" style="display:none" id="product-image" name="product-image" value="'.$row['product_image'].'">


      </form>
      <h4>Description</h4>
      <p>'.$row['product_description'].'</p>
    </div>';
  }
} else {
  echo '<img class="image" alt="" src="productImages/"></img>
  <div class="right-align">
    <h2>No Product Brand</h2>
    <h3>No Product Name</h3>
    <span class="price">£0.00</span>
    <form>
      <span class="text">Quanity</span>
      <input type="number" name="quanity" value="1" class="quanity">
      <a href="#2" value="'.$row['product_id'].'" class="btn btn-primary">Add To Basket</a>
    </form>
    <h4>Description</h4>
    <p>No Description</p>
  </div>';
}
?>
