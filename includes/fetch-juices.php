<?php
$sql = "SELECT * FROM products WHERE product_category = 'Juices'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)){
    echo '<a href="#">
      <div class="card mb-4">
        <img class="card-img-top" src="productImages/'.$row['product_image'].'" alt="Product Image">
        <div class="card-body">
          <h5 class="card-title">'.$row['product_brand'].'</h5>
          <h6 class="card-title">'.$row['product_name'].'</h6>
           <p class="card-text">'.$row['product_description'].'</p>
           <span class="card-text">£'.$row['product_price'].'</span>
           <a href="#2" value="'.$row['product_id'].'" class="btn btn-primary">Add To Basket</a>
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
