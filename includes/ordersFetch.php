<?php
if(isset($_POST['search'])) {
  $searchterm = mysqli_real_escape_string($db,$_POST['searchterm']); //strips slashes from the form

  $sql = "SELECT * from orders WHERE order_id LIKE '%$searchterm%' OR date LIKE '%$searchterm%' OR product_id LIKE '%$searchterm%' OR customer_name LIKE '%$searchterm%' OR customer_email LIKE '%$searchterm%' ORDER BY date, product_id";
  //search checks for all orders where order id, product id, name or email

  $result = mysqli_query($db, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
      echo '<tr>
        <th scope="row">'.$row[order_id].'</th>
        <td>'.$row[date].'</td>
        <td>'.$row[product_id].'</td>
        <td>'.$row[product_quanity].'</td>
        <td>'.$row[customer_name].'</td>
        <td>'.$row[customer_email].'</td>
      </tr>
      <div class="searchterm">
      <p>Search Term: '.$searchterm.'</p>
      <a href="order-management.php"><button type="button" class="btn btn-danger">Reset</button><a>
      </div>';
    }
  } else {
    echo '<tr>
      <th scope="row">No Order ID Found</th>
      <td>No Date Found</td>
      <td>No Product ID Found</td>
      <td>No Quanities Found</td>
      <td>No Customer Name Found</td>
      <td>No Customer Email Found</td>
    </tr>
    <div class="searchterm">
    <p>Search Term: <b>'.$searchterm.'<b></p>
    <a href="order-management.php"><button type="button" class="btn btn-danger">Reset</button><a>
    </div>';
  }
} else {
  $sql = "SELECT * from orders ORDER BY order_id, product_id";
  //search checks for all orders
  $result = mysqli_query($db, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
      echo '<tr>
        <th scope="row">'.$row[order_id].'</th>
        <td>'.$row[date].'</td>
        <td>'.$row[product_id].'</td>
        <td>'.$row[product_quanity].'</td>
        <td>'.$row[customer_name].'</td>
        <td>'.$row[customer_email].'</td>
      </tr>';
    }
  } else {
    echo '<tr>
      <th scope="row">No Order ID Found</th>
      <td>No Date Found</td>
      <td>No Product ID Found</td>
      <td>No Quanities Found</td>
      <td>No Customer Name Found</td>
      <td>No Customer Email Found</td>
    </tr>';
  }
}
?>
