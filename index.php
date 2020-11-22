 <?php
 include "includes/session.php";
 include "includes/head.php";
 ?> <!-- Calls the header -->

  <head>
    <title>Vape Station - Home</title>
  </head>

  <body class="">

    <?php include "includes/nav.php"; ?>

      <div class="container index">

        <div class="header">
          <h1>Welcome to <span class="VapeStation">VapeStation<span></h1>
          <h6>Vape Juice, Mods and <b>FREE SHIPPING<b></h6>
        </div>

        <hr>

        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselIndicators" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <a href="juices.php"><img class="d-block w-100" src="images/ruthless-banner.jpg" alt="First slide"><a>
              <div class="carousel-caption d-none d-md-block">
                <h5>Vapes</h5>
              </div>
            </div>
            <div class="carousel-item">
              <a href="mods.php"><img class="d-block w-100" src="images/modsimg.jpg" alt="Second slide"></a>
              <div class="carousel-caption d-none d-md-block">
                <h5>Mods</h5>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <hr>

      </div>

    <?php include "includes/footer.php"; ?>
