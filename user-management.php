<?php
include "includes/admin-session.php";
include "includes/head.php";
?> <!-- Calls the header -->


 <head>
   <title>Vape Station - User Management</title>
 </head>

 <body class="">

   <?php include "includes/nav.php" ?>

     <div class="container">
       <p>logged in</p>
       <?php echo $_SESSION['user_level']; ?>
       <?php echo $_SESSION['user_name']; ?>
     </div>

   <?php include "includes/footer.php" ?>
