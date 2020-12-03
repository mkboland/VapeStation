<?php
include "includes/session.php";
include "includes/head.php";
?> <!-- Calls the header -->

 <head>
   <title>Vape Station - Basket</title>
 </head>

 <body class="">

   <?php include "includes/nav.php"; //calls navbar?>

     <div class="container">
       <?php include "includes/cartFetch.php"; //calls the cart fetch script ?>

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
         //if there is an error adding items into basket it displays an alert
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
           if (details.error === 'INSTRUMENT_DECLINED') {
             return actions.restart(); //if card is declined restarts paypal journey
          }else {
            window.location.href = "includes/orderConfirm.php?name=" + details.payer.name.given_name + "&email=" + details.payer.email_address + "&id=" + details.id;
            //if payment goes through redirects to orderConfirm script
          }
         });
       },
       onCancel: function (data) {
         // if buyer cancels order it redirects to cancelled script
         window.location.href = "cancelled.php?cancelled=true";
      }
     }).render('#paypal-button-container');
   </script>

   <?php include "includes/footer.php"; ?>
