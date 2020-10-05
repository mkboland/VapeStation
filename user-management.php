<?php
include "includes/admin-session.php";
include "includes/head.php";
?> <!-- Calls the header -->


 <head>
   <title>Vape Station - User Management</title>
 </head>

 <body class="">

   <?php include "includes/nav.php"; ?>

     <div class="container">

       <?php include "includes/users-fetch.php"; ?>

       <div class="row">


                 <div class="track ml-auto">
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaladd">Add</button>
               </div>

               <div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                 <div class="modal-dialog  modal-dialog-centered" role="document">
                   <form class="modal-content" action="includes/add-user.php" method="post">
                     <div class="modal-header">
                       <h5 class="modal-title" id="modaladd">Add User</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <div class="form-group">

                         <label for="username">Usename</label>
                         <input type="text" class="form-control" id="username" name="username" placeholder="Enter New Username" required>

                         <label for="email">Email</label>
                         <input type="email" class="form-control" id="email" name="email" placeholder="Enter New Email" required>

                         <label for="password">Password</label>
                         <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" required>

                         <div class="input-group mb-3">
                           <div class="input-group-prepend">
                             <label class="input-group-text" for="userlvl">User Level</label>
                           </div>
                           <select class="custom-select" id="userlvl" name="userlvl" required>
                             <option value="1">Admin</option>
                           </select>
                         </div>

                       </div>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                       <button type="submit" class="btn btn-success" name="save" value="save">Save</button>
                     </div>
                   </form>
                 </div>
               </div>
             </div>


       <?php
       $sucess = $_SESSION['updated'];
       $deleted = $_SESSION['deleted'];
       $added = $_SESSION['added'];
       $error = $_SESSION['error'];

       if(isset($_SESSION['updated'])){
         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
               '.$sucess.'
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>';
         unset($_SESSION['updated']);
       }
       elseif(isset($_SESSION['deleted'])) {
         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               '.$deleted.'
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>';
         unset($_SESSION['deleted']);
       }
       elseif(isset($_SESSION['added'])) {
         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
               '.$added.'
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>';
         unset($_SESSION['added']);
       }
       elseif(isset($_SESSION['error'])) {
         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               '.$error.'
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>';
         unset($_SESSION['error']);
       }
       ?>

     </div>

   <?php include "includes/footer.php"; ?>
