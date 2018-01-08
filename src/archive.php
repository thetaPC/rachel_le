<?php

    include '../database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rachel - Archive</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/social.css">
    <link rel="stylesheet" href="../css/archive.css">
    <link rel="stylesheet" href="../css/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/btt.css">
  </head>

  <body>

    <?php include 'repeats/navbar.php'; ?>
    <?php include 'repeats/social.php'; ?>
    <?php include 'repeats/backtotop.html'; ?>
    
    <div class="container arch-section">
        <div clas="row">
            <div class="col-md-12">
                <?php
                    $sql = "SELECT * FROM images ORDER BY year DESC, month DESC";
                    
                    $res = mysqli_query($conn, $sql);
                    $year = 0;   
                    $month = 0;
                    $flag = false;
                    
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            if ($year != $row['year']) {
                                echo "<h2>" . $row['year'] . "</h2>";
                                $year = $row['year'];
                            }
                            
                            if ($month != $row['month']) {
                                $monthNum  = (int)$row['month'];
                                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                $monthName = $dateObj->format('F'); 
                                echo "<h5>" . $monthName . "</h5>";
                                $month = $row['month'];
                            
                            
                                $sql1 = "SELECT * FROM images where year=" . $row['year'] . " AND month=" . $row['month'] . " ORDER BY year DESC, month DESC";
                                
                                $res1 = mysqli_query($conn, $sql1);
                                
                                echo "<div class='row'>";
                                
                                if (mysqli_num_rows($res1) > 0) {
                                    while ($row1 = mysqli_fetch_assoc($res1)) {
                                        echo "<div class='col-md-2_5 marg-b'>
                                            <a class='a_img' data-fancybox='group' data-caption='" . $row1['name'] . "' href='../img/uploads/" . $row1['file_name'] . "'>
                                                <div class='resize'>
                                                  <img class='' src='../img/uploads/" . $row1['file_name'] . "' alt='" . $row1['name'] . "' /> 
                                                </div>
                                            </a>
                                        </div>";
                                    }
                                }
                                
                                echo "</div>";
                            
                            } 
                                
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="../js/fancybox/jquery.fancybox.min.js"></script>
    
    <script>
      $(document).ready(function() {
      	$("[data-fancybox]").fancybox({
      		// Options will go here
      		loop : true,
      		animationEffect : "zoom-in-out",
      	});
      });
    </script>
  </body>
</html>
