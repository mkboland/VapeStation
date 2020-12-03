 <?php
 include "includes/session.php";
 include "includes/head.php";
 ?> <!-- Calls the header -->

  <head>
    <title>Vape Station - Product Page</title> <!-- make dynamic -->
  </head>

  <body class="">

    <?php include "includes/nav.php"; ?>

      <div class="container">
        <div class="product-page">

          <?php include "includes/fetch-product-page.php"; //call product page script, product changes based on info passed?>

        </div>
      </div>

    <?php include "includes/footer.php"; ?>
