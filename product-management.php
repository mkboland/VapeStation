<?php
include "includes/admin-session.php";
include "includes/head.php";
?> <!-- Calls the header -->

 <head>
   <title>Vape Station - Product Mangement</title>
 </head>

 <body class="">

   <?php include "includes/nav.php"; ?>

   <div class="container">
     <div class="row">
       <div class="card-deck">

         <a href="edit-products.php">
           <div class="card mb-4">
            <i class="fas fa-edit fa-9x text-center"></i>
             <div class="card-body">
               <h5 class="card-title">Edit Products</h5>
              </div>
           </div>
         </a>

         <a href="add-products.php">
           <div class="card mb-4">
             <i class="fas fa-plus fa-9x text-center"></i>
             <div class="card-body">
               <h5 class="card-title">Add Products</h5>
              </div>
           </div>
         </a>

    </div>
  </div>
</div>


 <?php include "includes/footer.php"; ?>
