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
      <form>
        <span class="text">Quanity</span>
        <input type="number" name="quanity" value="1" class="quanity">
        <a href="#2" value="'.$row['product_id'].'" class="btn btn-primary">Add To Basket</a>
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
