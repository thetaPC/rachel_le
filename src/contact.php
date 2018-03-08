<?php
    
    include '../database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rachel - Contact</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/social.css">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   	<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
   	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="../css/contact.css" type="text/css" />
  </head>

  <body>

    <?php include 'repeats/navbar.php'; ?>
    <?php include 'repeats/social.php'; ?>
    

    <div id="contact" class="cont-section">
		<div class="section-content">
			<h1 class="section-header"><span class="content-header">Get in Touch With Me</span></h1>
		</div>
		<div class="contact-section">
			<div class="container">
				<form id="contactForm">
				    <div class="row">
                <div class="col-md-6 form-line">
    			  			<div class="form-group">
    			  				<label for="name">Your name</label>
    					    	<input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
    				  		</div>
    				  		<div class="form-group">
    					    	<label for="email">Email Address</label>
    					    	<input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
    					  	</div>	
    					  	<div class="form-group">
    					    	<label for="telephone">Phone No.</label>
    					    	<input type="tel" name="tel" class="form-control" id="telephone" placeholder="Enter phone number">
    			  			</div>
			  		    </div>
    			  		<div class="col-md-6">
    			  			<div class="form-group">
    			  				<label for="msg">Message</label>
    			  			 	<textarea class="form-control" name="msg" id="msg" placeholder="Enter Your Message" required></textarea>
    			  			</div>
    			  			<button id="contSub" type="submit" class="btn btn-outline-secondary submit">
    			  			    Send
			  			    </button>
    					</div>
					</div>
				</form>
			</div>
		</div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script>
      $('#contSub').on('click', function(e) {
        e.preventDefault();
        if ($('#contactForm').valid()) {
          console.log('send msg');
        }
      });
    </script>
  </body>
</html>
