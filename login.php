<?php
include "includes/login-submit.php";
include "includes/head.php"
?> <!-- Calls the header -->


 <head>
   <title>Vape Station - Admin Login</title>
 </head>

 <body class="">

   <?php include "includes/nav.php" ?>

     <div class="container">
       <body class="text-center login">
        <form class="form-signin" method="post">
          <h1 class="h3 mb-3 font-weight-normal">Welcome to Project Data Tracker</h1>
          <h2 class="h3 mb-3 font-weight-normal">Please sign in</h2>

          <label for="email" class="sr-only">Email address</label>
          <input type="email" id="username" name="username" class="form-control" placeholder="Email address" required="" autofocus="" autocomplete="on" >

          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="" autocomplete="on">

          <button class="btn btn-lg btn-primary btn-block login-btn" type="submit" value="submit">Sign in</button>

          <p> <?php echo $error; ?></p>

        </form>
     </div>

   <?php include "includes/footer.php" ?>
