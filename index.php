<?php
    
    include 'database/db_connection.php';
    
    $sql = "UPDATE visits SET total=  total + 1 where id= 1";

    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully";
    } else {
        // echo "Error updating record: " . mysqli_error($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rachel - Home</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/social.css">
    <link rel="stylesheet" href="css/carousel.css">
  </head>

  <body>

    <?php include 'src/repeats/navbar.php'; ?>
    <?php include 'src/repeats/social.php'; ?>
    
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-caption intro">
            <h4 class="intro-text">Artist. Designer. Coder to be. Intern and Marketing Coordinator at ValleyWorx.</h4>
        </div>
        <ol class="carousel-indicators">
          <?php
            $sql = "SELECT count(*) as count FROM images where slideshow=1";
                                  
            $res = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($res) > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
                for ($x = 0; $x < $row['count']; $x++) {
                  if ($x == 0) {
                    echo "<li  class='active' data-target='#carouselExampleIndicators' data-slide-to='" . $x . "'></li>";
                  } else {
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='" . $x . "'></li>";
                  }
                } 
              }
            }
          ?>
        </ol>
        <div class="carousel-inner" role="listbox">
          <?php
            $sql = "SELECT * FROM images where slideshow=1";
                                  
            $res = mysqli_query($conn, $sql);
            
            $first = true;
            
            if (mysqli_num_rows($res) > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
                if ($first) {
                  echo '<div class="carousel-item active" style="background-image: url(\'https://res.cloudinary.com/htqimzujb/image/upload/' . $row['file_name'] . '\');"></div>';
                  $first = false;
                } else {
                  echo '<div class="carousel-item" style="background-image: url(\'https://res.cloudinary.com/htqimzujb/image/upload/' . $row['file_name'] . '\');"></div>';
                }
              }
            }
          ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>
