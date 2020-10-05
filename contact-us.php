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

       <h2 class="text-center">Contact Us</h2>

       <form enctype="multipart/form-data" action="includes/contact-submit.php" method="post" class="contact">

    	  	<div class="form-row">
    				<div class="form-group col-md-6">
    			  		<label for="firstName">First Name</label>
    			  		<input type="text" class="form-control" name="firstName" placeholder="First name" required>
    				</div>

    				<div class="form-group col-md-6">
    			  		<label for="lastName">Last Name</label>
    			  		<input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
    				</div>
    	  	</div>


    	  	<div class="form-row">
    				<div class="form-group col-md-6">
    				  <label for="email">Email</label>
    				  <input type="email" class="form-control" name="email" placeholder="123@mail.com" required>
    				</div>

    				<div class="form-group col-md-6">
    					<label for="phone">Contact Number</label>
    					<input type="number" class="form-control" name="phone" placeholder="Phone Number" required>
    				</div>
      	</div>

        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" rows="3" placeholder="Write message here..." required></textarea>
          </div>
      </div>

				<button type="submit" class="btn btn-submit" name="submit" value="submit">
				  Submit
				</button>

        <?php
        $sent = $_SESSION['sent'];
        $error = $_SESSION['error'];

        if(isset($_SESSION['sent'])){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                '.$sent.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
          unset($_SESSION['sent']);
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

			</form>

     </div>

   <?php include "includes/footer.php"; ?>
