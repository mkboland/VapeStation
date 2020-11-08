<?php
$cancelled = $_GET['cancelled'];

if($cancelled == 'true'){
  echo "<h2>Order Cancelled</h2>

  <p>Your order has been cancelled.</p>";
} else {
  header("Location: index.php");
}
?>
