<?php
include "includes/admin-session.php";
include "includes/head.php";
?> <!-- Calls the header -->

 <head>
   <title>Vape Station - Checkout</title>
 </head>

 <body class="">

   <?php include "includes/nav.php"; ?>

     <div class="container">

       <h4 class="mb-3">Billing address</h4>

       <form>
         <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required="">
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" placeholder="Country">
          </div>
          <div class="col-md-3 mb-3">
            <label for="postcode">Post Code</label>
            <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Post Code" required>
          </div>
        </div>

        <hr>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="shippingAddress" name="shippingAddress" required>
            <label class="form-check-label" for="shippingAddress">
              Shipping address is the same as my billing address
            </label>
          </div>
        </div>

        <hr>

        <h4 class="mb-3">Shipping</h4>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="freeshipping" name="freeshipping" checked required>
            <label class="form-check-label" for="freeshipping">
              Free
            </label>
          </div>
        </div>

        <button class="btn btn-primary" type="submit">Continue</button>

      </form>

     </div>

   <?php include "includes/footer.php"; ?>
