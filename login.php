<?php
include "includes/login-submit.php"; //calls login-submit script
include "includes/head.php";
?> <!-- Calls the header -->


 <head>
   <title>Vape Station - Admin Login</title>
 </head>

 <body class="">

   <?php include "includes/nav.php"; ?>

     <div class="container">
       <div class="text-center login">
        <form class="form-signin" method="post">
          <h1 class="h3 mb-3 font-weight-normal">Admin Dashboard</h1>
          <h2 class="h3 mb-3 font-weight-normal">Sign in</h2>

          <label for="email" class="sr-only">Email address</label>
          <input type="email" id="username" name="username" class="form-control" placeholder="Email address" required="" autofocus="" autocomplete="on" >

          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="" autocomplete="on">

          <button class="btn btn-lg btn-primary btn-block login-btn" type="submit" value="submit">Sign in</button>

          <p> <?php echo $error; //echos any error from login-submit?></p>

        </form>
     </div>
   </div>

   <?php include "includes/footer.php"; ?>
