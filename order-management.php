<?php
include "includes/admin-session.php";
include "includes/head.php";
?> <!-- Calls the header -->

 <head>
   <title>Vape Station - Order Management</title>
 </head>

 <body class="">

   <?php include "includes/nav.php"; ?>

     <div class="container">

       <form action="order-management.php" class="ordersearch" accept-charset="UTF-8" method="post">
         <div class="input-group">
           <input type="text" name="searchterm" id="search" placeholder="Search" class="form-control radius">
           <span class="input-group-btn">
           <button class="btn btn-dark col- ml-1" type="submit" name="search">Search</button>
           </span>
         </div>
       </form>

       <div class="table-responsive">
         <table class="table">
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Date</th>
              <th scope="col">Product ID</th>
              <th scope="col">Product Quanity</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Customer Email</th>
            </tr>
          </thead>
          <tbody>
            <?php include "includes/ordersFetch.php"; ?>
          </tbody>
        </table>
      </div>

     </div>

   <?php include "includes/footer.php"; ?>
