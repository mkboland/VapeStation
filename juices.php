 <?php
 include "includes/session.php";
 include "includes/head.php";
 ?> <!-- Calls the header -->

  <head>
    <title>Vape Station - Juices</title>
  </head>

  <body class="">

    <?php include "includes/nav.php"; ?>

      <div class="container">
        <div class="row">
          <div class="card-deck">

            <?php include "includes/fetch-juices.php"; //calls fetch-juices ?>

       </div>
     </div>
   </div>

    </div>

    <?php include "includes/footer.php"; ?>
