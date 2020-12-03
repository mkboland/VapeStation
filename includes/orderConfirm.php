<?php
  session_start();
  include "config.php"; //connect to db

  $productID = array_column($_SESSION['cart'], 'product-id'); //takes all the product id and makes them a single array from multi
  $quanity = array_column($_SESSION['cart'], 'quanity'); // takes all the quanity and makes them a single array
  $update = array_combine($productID, $quanity); //combines the array for updating stock

  $today = date("Y-m-d H:i:s"); //todays date and time

  $_SESSION['paymentName'] = $_GET['name']; //changes the get to sessions
  $_SESSION['paymentEmail'] = $_GET['email'];
  $_SESSION['paymentID'] = $_GET['id'];

  $to = $_SESSION['paymentEmail']; //who confirm is going to
  $name = $_SESSION['paymentName']; //for the email
  $payment = $_SESSION['paymentID']; //for the email
  $subject = "Vape Station Order Confirmation"; //subject of the email

  $msg = '
  <!doctype html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>VapeStation Order Confirmation</title>
    </head>
    <body style="padding:0; margin: 0 5%; height: 100vh; position: relative">

      <div style="width: 100%; height: 200px; background: #1d1d1d;">
        <h1 style="margin: 0; padding: 75px; text-align: center; color: #cf7500">VapeStation</h1>
      </div>

      <div style="text-align: center">
        <h2 style="color: #cf7500">Thank you '.$name.'</h2>

        <p>Your Order: <span style="font-weight: bold; color: #cf7500;">'.$payment.'</span> will be with you within 5 working days.</p>
        <p>Best Regards</p>
        <p style="font-weight: bold; color: #cf7500;">VapeStation</p>
      </div>

      <div style="width: 100%; height: 200px; background: #1d1d1d; position: absolute; bottom: 0;">
        <h1 style="margin: 0; padding: 75px; text-align: center; color: #cf7500">VapeStation</h1>
      </div>

    </body>
  </html>
  '; //html message with inputed data from order

  // array of all headers needed
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=iso-8859-1';
  $headers[] = 'From: Vape Station <info@vapestation.co.uk>';
  $headers[] = 'Reply-To: Vape Station <info@vapestation.co.uk>';
  $headers[] = 'Bcc: michael@michaelboland.co.uk';

  if(isset($_SESSION['paymentName']) && isset($_SESSION['paymentEmail']) && isset($_SESSION['paymentID']) ) { //if the payment has gone through
    foreach ($update as $productIDupdate => $quanityupdate) { //for each product and quanity update
      $sql = "UPDATE `products` SET product_stock=product_stock-$quanityupdate WHERE product_id = $productIDupdate";
      mysqli_query($db, $sql);
    }

    foreach ($update as $productIDorder => $quanityOrder) { //for each product and quanity place it in orders table
      $sql = "INSERT INTO `orders` (`order_id`, `date`, `product_id`, `product_quanity`, `customer_name`, `customer_email`) VALUES ('$payment', '$today', '$productIDorder', '$quanityOrder', '$name', '$to')";
      mysqli_query($db, $sql);
    }

    mail($to, $subject, $msg, implode("\r\n", $headers)); //send email

    unset($_SESSION["cart"]); //unsets the cart so no items in cart
    header("Location: ../thankyou.php"); //order confirm page
  } else {
    unset($_SESSION["cart"]); //resets cart to try again
    $_SESSION['error'] = "An unexpected error occured. Please try again";
    header("Location: ../basket.php"); //error occured alert displayed
  }
?>
