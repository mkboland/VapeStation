<?php
//$productID = array_column($_SESSION['cart'], 'product-id'); //takes all the product id and makes them a single array from multi
//$quanity = array_column($_SESSION['cart'], 'quanity'); // takes all the quanity and makes them a single array
$total = array_column($_SESSION['cart'], 'product-price');
// $sql = "SELECT * FROM products WHERE product_id IN (".implode(',', $productID).")"; //prepares the sql statement

  if (!empty($_SESSION['cart'])) { //checks session is set

    foreach($_SESSION['cart'] AS $product){

      echo '<div class="basket">
          <p style="display:none">'.$product['product-id'].'</p>
          <img src="productImages/'.$product['product-image'].'" alt="Product Image"></img>

          <div class="brand">
              <h5>Brand: '.$product['product-brand'].'</h5>
              <h6>Name: '.$product['product-name'].'</h6>
          </div>

            <div class="price">
              <form action="includes/cartSessionUpdate.php" method="post" enctype="multipart/form-data">
                <h5>£'.$product['product-price'].'</h5>
                <h6>Quanity: <span><input type="number" id="quanity" name="quanity" value="'.$product['quanity'].'"></input></span></h6>

                  <div class="button">
                  <input type="text" style="display:none" id="product-id" name="product-id" value="'.$product['product-id'].'">
                  <input type="text" style="display:none" id="product-price" name="product-price" value="'.$product['product-price'].'">

                  <button type="submit" class="btn btn-danger" name="delete" value="delete">Delete</button>
                  <button type="submit" class="btn btn-success" name="update" value="update">Update</button>
                </form>
              </div>
            </div>
        </div>';
    }

    echo '<div class="total">
      <h5>Total: £'.array_sum($total).'</h5>
      <div class="checkoutbutton">
        <a href="includes/cartSessionDestroy.php"><button type="submit" class="btn btn-danger" name="empty" value="Empty Basket">Empty Basket</button></a>
        <button type="submit" class="btn btn-primary" name="checkout" value="Checkout">Checkout</button>
      </div>
    </div>';

  } else {
    echo '<h5 style="text-align:center;">No Products Found in Cart<h5>';
  }





?>
