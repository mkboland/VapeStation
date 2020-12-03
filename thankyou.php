<?php
include "includes/sessionPayment.php";
include "includes/head.php";
?> <!-- Calls the header -->

 <head>
   <title>Vape Station - Order Confirmed</title>
 </head>

 <body class="">

   <?php include "includes/nav.php"; ?>

   <!-- Order Confirm Page, only accessible once payment has been made -->
     <div class="container thankyou">
       <h2>Thank you <?php echo $_SESSION['paymentName']?></h2>

       <p>Your Order: <span><?php echo $_SESSION['paymentID']?></span> will be with you within 5 working days.</p>
       <p>Best Regards</p>
       <p><span>VapeStation</span></p>

     </div>

   <?php session_destroy() //destorys all sessions after leaving this page ?>

   <?php include "includes/footer.php"; ?>
