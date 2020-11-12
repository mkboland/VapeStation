<?php
include "includes/session.php";
include "includes/head.php";
?> <!-- Calls the header -->

 <head>
   <title>Vape Station - Basket</title>
 </head>

 <body class="">

   <?php include "includes/nav.php"; ?>

     <div class="container">
       <?php include "includes/cartFetch.php"; ?>

       <?php
         $error = $_SESSION['error'];

         if(isset($_SESSION['error'])) {
           echo '<div class="alert alert-danger alert-dismissible fade show basketAlert" role="alert">
                 '.$error.'
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>';
           unset($_SESSION['error']);
         }
       ?>
    </div>

     <script>
      paypal.Buttons({
       createOrder: function(data, actions) {
         // This function sets up the details of the transaction, including the amount and line item details.
         return actions.order.create({
           purchase_units: [{
             amount: {
               value: '<?php echo $arrTotal; ?>'
             }
           }]
         });
       },
       onApprove: function(data, actions) {
         // This function captures the funds from the transaction.
         return actions.order.capture().then(function(details) {
           // This function shows a transaction success message to your buyer.
           if (details.error === 'INSTRUMENT_DECLINED') {
             return actions.restart(); //if card is declined
          }else {
            window.location.href = "includes/orderConfirm.php?name=" + details.payer.name.given_name + "&email=" + details.payer.email_address + "&id=" + details.id;
          }
         });
       },
       onCancel: function (data) {
         // Show a cancel page, or return to cart
         window.location.href = "cancelled.php?cancelled=true";
      }
     }).render('#paypal-button-container');
   </script>

   <?php include "includes/footer.php"; ?>
