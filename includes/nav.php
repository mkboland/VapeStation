<div class="navcolour">
  <nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container">
      <a class="navbar-brand" href="index.php">Vape Station</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mt-2 mt-lg-0  ml-auto text-right">
          <li class="nav-item <?php if($_SESSION['user_level'] != 1){echo "hide-admin";}?>">
            <a class="nav-link" href="admin-dashboard.php">Admin Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="juices.php" >Juices</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mods.php" >Mods</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" >Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php" >Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Basket <i class="fas fa-shopping-basket"></i> 0</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container hide">
     <form class="form-inline my-2 my-lg-0 ml-auto" action="search.php" accept-charset="UTF-8" method="post">
       <input class="form-control mr-sm-2" type="text" placeholder="Search" name="searchterm" id="search">
       <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="search">Search</button>
     </form>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container">
      <div class="col-12 mobsearch">
        <form action="search.php" accept-charset="UTF-8" method="post">
          <div class="input-group">
            <input type="text" name="searchterm" id="search" placeholder="Search" class="form-control radius">
            <span class="input-group-btn">
            <button class="btn btn-outline-dark col- ml-1" type="submit" name="search">Search</button>
            </span>
          </div>
        </form>
      </div>
    </div>
 </nav>
</div>
