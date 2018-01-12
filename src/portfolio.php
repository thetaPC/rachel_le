<?php

    include '../database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rachel - Portfolio</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/social.css">
    <link rel="stylesheet" href="../css/portfolio.css">
    <link rel="stylesheet" href="../css/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/btt.css">
    
  </head>

  <body>

    <?php include 'repeats/navbar.php'; ?>
    <?php include 'repeats/social.php'; ?>
    <?php include 'repeats/backtotop.html'; ?>
    
    
    <div class="container port-section">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <hr>
            <center>
              <button class="art-categories fil-cat" href="" data-rel="all">All</button>
              <span>/</span>
              <button class="art-categories fil-cat" data-rel="digital">Digital</button>
              <span>/</span>
              <button class="art-categories fil-cat" data-rel="abstract">Abstract</button>
              <span>/</span>
              <button class="art-categories fil-cat" data-rel="traditional">Traditional</button>
              <span>/</span>
              <button class="art-categories fil-cat" data-rel="logos">Logos</button>
            </center>
          <hr>
        </div>
      </div>
      
      <div id="portfolio" class="row">
        <?php
          $sql = "SELECT * FROM images";
                                
          $res = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($res) > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
                  echo "<div class='tile scale-anm " . $row['category'] . " all col-md-4 smaller'>";     
                          if ($row['description'] != "") {
                            echo "<a class='a_img' data-fancybox='group' data-caption='" . $row['name'] . " - " . $row['description'] . "' href='https://res.cloudinary.com/htqimzujb/image/upload/" . $row['file_name'] . "'>";
                          } else {
                            echo "<a class='a_img' data-fancybox='group' data-caption='" . $row['name'] . "' href='https://res.cloudinary.com/htqimzujb/image/upload/" . $row['file_name'] . "'>";
                          }
                            echo "<div class='resize'>
                              <img id='" . $row['id'] . "' class='port-img' src='https://res.cloudinary.com/htqimzujb/image/upload/" . $row['file_name'] . "' alt='" . $row['description'] . "' />
                            </div>
                          </a>
                        </div>";
              }
          }
        ?>
      </div>
    </div> 

    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="../js/fancybox/jquery.fancybox.min.js"></script>
    <script src="../js/btt.js"></script>
    
    <script>
      $(document).ready(function() {
      	$("[data-fancybox]").fancybox({
      		// Options will go here
      		loop : true,
      		animationEffect : "zoom-in-out",
      	});
      	
      	let selectedClass = "";
      		$(".fil-cat").on('click', function() { 
        		selectedClass = $(this).attr("data-rel"); 
            $("#portfolio").fadeTo(100, 0.1);
        		$("#portfolio .tile").not("."+selectedClass).fadeOut().removeClass('scale-anm');
        		$(".a_img").not("."+selectedClass).attr('data-fancybox', '');
            setTimeout(function() {
              $("."+selectedClass).fadeIn().addClass('scale-anm');
              $("."+selectedClass+" .a_img").attr('data-fancybox', 'group');
              $("#portfolio").fadeTo(300, 1);
            }, 300); 
      	});
      });
      
      $('.art-categories').on('click', function() {
        $('.art-categories').removeClass('dotted');
        $(this).addClass('dotted');
      });
      
      $(".port-img").on("click", function (e) {
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "admin/clicks.php",
          dataType: "json",
          data: {
            "id": $(this).attr('id'),
          },
          success: function(data,status) {
            
          },
          complete: function(data,status) { //optional, used for debugging purposes
            
          }
        });//AJAX 
      });
      
    </script>
  </body>
</html>
