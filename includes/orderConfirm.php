<?php
  session_start();
  include "config.php";

  $productID = array_column($_SESSION['cart'], 'product-id'); //takes all the product id and makes them a single array from multi
  $quanity = array_column($_SESSION['cart'], 'quanity'); // takes all the quanity and makes them a single array
  $update = array_combine($productID, $quanity);

  $_SESSION['paymentName'] = $_GET['name'];
  $_SESSION['paymentEmail'] = $_GET['email'];
  $_SESSION['paymentID'] = $_GET['id'];

  $to = $_SESSION['paymentEmail'];
  $name = $_SESSION['paymentName'];
  $payment = $_SESSION['paymentID'];
  $subject = "Vape Station Order Confirmation";

  $msg = '
  <!doctype html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>VapeStation Order Confirmation</title>
    </head>
    <body style="padding:0; margin: 0 25%; height: 100vh; position: relative">

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
  ';

  $headers = "From: info@vapestation.co.uk\r\nReply-To: info@vapestation.co.uk\r\nContent-type: text/html";

  if(isset($_SESSION['paymentName']) && isset($_SESSION['paymentEmail']) && isset($_SESSION['paymentID']) ) {
    foreach ($update as $productIDupdate => $quanityupdate) {
      $sql = "UPDATE `products` SET product_stock=product_stock-$quanityupdate WHERE product_id = $productIDupdate";
      mysqli_query($db, $sql);
    }

    mail($to,$subject,$msg,$headers);

    unset($_SESSION["cart"]);
    header("Location: ../thankyou.php");
  } else {
    unset($_SESSION["cart"]);
    header("Location: ../basket.php");
  }
?>
