<?php
include "includes/admin-session.php";
include "includes/head.php";
?> <!-- Calls the header -->


 <head>
   <title>Vape Station - Admin Dashboard</title>
 </head>

 <body class="">

   <?php include "includes/nav.php" ?>

   <div class="container">
     <div class="row">
       <div class="card-deck">

         <a href="product-management.php">
           <div class="card mb-4">
             <img class="card-img-top" src="https://placehold.it/280x140/abc" alt="Product Image">
             <div class="card-body">
               <h5 class="card-title">Product Management</h5>
              </div>
           </div>
         </a>

         <a href="user-management.php">
           <div class="card mb-4">
             <img class="card-img-top" src="https://placehold.it/280x140/abc" alt="Product Image">
             <div class="card-body">
               <h5 class="card-title">User Management</h5>
              </div>
           </div>
         </a>

    </div>
  </div>
</div>


 <?php include "includes/footer.php" ?>