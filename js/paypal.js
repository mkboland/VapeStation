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
     //alert('Transaction completed by ' + details.payer.name.given_name + ' Email: ' + details.payer.email_address); //redirect and finish

     window.location.href = "includes/orderConfirm.php?name=" + details.payer.name.given_name + "&email=" + details.payer.email_address;

   });
 }
}).render('#paypal-button-container');
