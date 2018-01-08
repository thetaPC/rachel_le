<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rachel - Contact</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/social.css">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   	<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/contact.css" type="text/css" />
  </head>

  <body>

    <?php include 'repeats/navbar.php'; ?>
    <?php include 'repeats/social.php'; ?>
    

    <div id="contact" class="cont-section">
		<div class="section-content">
			<h1 class="section-header">Get in <span class="content-header"> Touch with me</span></h1>
			<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
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
    			  			    <i class="fa fa-paper-plane" aria-hidden="true"></i>
    			  			    Send Message
			  			    </button>
    					</div>
					</div>
				</form>
			</div>
		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
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
