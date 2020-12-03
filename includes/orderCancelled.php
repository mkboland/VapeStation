<?php
$cancelled = $_GET['cancelled'];

if($cancelled == 'true'){ //if user clicks off paypal it cancels order
  echo "<h2>Order Cancelled</h2>

  <p>Your order has been cancelled.</p>";
} else {
  header("Location: index.php"); //to stop people accessing this page otherwise
}
?>
