<?php

    include '../database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rachel - About</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/social.css">
    <link rel="stylesheet" href="../css/about.css">
  </head>

  <body class="bg-color">

    <?php include 'repeats/navbar.php'; ?>
    <?php include 'repeats/social.php'; ?>
    
    
    <div class="container about-section">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <?php
                    $sql = "SELECT * FROM my_account where id=1";
                    
                    $res = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<img src='https://res.cloudinary.com/htqimzujb/image/upload/" . $row['profile_img'] . "' class='rounded-circle img-fluid img-thumbnail' alt='Rachel Le'>";
                            // echo "<img src='https://res.cloudinary.com/htqimzujb/image/upload/" . $row['profile_img'] . "' class='rounded img-fluid img-thumbnail' alt='Rachel Le'>";
                            // echo "<img src='https://res.cloudinary.com/htqimzujb/image/upload/" . $row['profile_img'] . "' class='rounded-circle img-fluid' alt='Rachel Le'>";
                        }
                    }
                ?>
            </div>
            <div class="col-md-7">
                <h3>Rachel Le</h3>
                <?php
                    $sql = "SELECT * FROM my_account where id=1";
                    
                    $res = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<p>" . $row['bio'] . "</p>";
                        }
                    }
                ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
