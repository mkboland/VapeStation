 <?php
 include "includes/session.php";
 include "includes/head.php";
 ?> <!-- Calls the header -->

  <head>
    <title>Vape Station - Home</title>
  </head>

  <body class="">

    <?php include "includes/nav.php"; ?>

      <div class="container">
        <?php echo $_SESSION['user_level']; ?>
      </div>

    <?php include "includes/footer.php"; ?>
