<footer>

    <div class="row container m-auto">

      <div class="col-sm-3">
        <h5>Get in touch</h5>
        <a href="mailto:michael@michaelboland.co.uk?Subject=Vapes%20Station%20Enquiry" target="_top">Email</a>

        <h5>Admin</h5>
        <a href="login.php" class="<?php if($_SESSION['user_level'] != 0){echo "hide";}?>">Log In</a>
        <a href="logout.php" class="<?php if($_SESSION['user_level'] != 1){echo "hide";}?>">Log Out</a>
      </div>

      <div class="col-sm-3">
        <h5>Located at</h5>
        <p>Bridlington</br> North Humberside</br> United Kingdom</p>
      </div>

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37441.74923762334!2d-0.23072051297447238!3d54.0895369661021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4878ad4c42d80fe5%3A0x97a2164929538955!2sBridlington!5e0!3m2!1sen!2suk!4v1565463431303!5m2!1sen!2suk" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

    </div>

    <div class="row">
      <div class="col-sm-12 copyright">
        <p>Designed and Developed By</br> Michael Boland ©<script src="js/date-min.js"></script>. All Rights Reversed<p>
      </div>
    </div>

    <script src="js/tooltip-min.js"></script>

  </footer>
</body>
</html>
