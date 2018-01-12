<?php

    session_start();
    
    if (isset($_SESSION["login"])) {  //Check whether the admin has logged in
        if ($_SESSION["login"] == "N") {
            header('Location: login.php');
        }
    } else {
        header('Location: login.php');
    }
    include 'database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rachel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/social.css">
    <link rel="stylesheet" href="css/admin/dashboard.css">
</head>
<body>
  
    <?php include 'src/repeats/navbar.php'; ?>
  
    <div class="container dash-section">
        <div class="col-md-12">
            <div class="page-header">
                <a href=""><i class="fa fa-tachometer" aria-hidden="true"></i></a>
                <h2>Hello, Rachel</h2>
            </div>
            <p class="lead"><a href="src/admin/logout.php">Log out</a></p>
            <hr>
            <div class="row justify-content-center m-bot">
                <div class="col-md-3 parent">
                    <div class="visits">
                        <?php
                          $sql = "SELECT total FROM visits";
                                                
                          $res = mysqli_query($conn, $sql);
                          
                          if (mysqli_num_rows($res) > 0) {
                              while ($row = mysqli_fetch_assoc($res)) {
                                  echo "<h1>" . $row['total'] . "</h1>";
                              }
                          }
                        ?>
                        <p>Visits</p>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1 parent">
                    <div class="popular">
                        <div class="row justify-content-md-center">
                            <div class="col-md-5">
                               <?php
                                  $sql = "SELECT * FROM images WHERE clicks=(SELECT MAX(clicks) FROM images) LIMIT 1";
                                                        
                                  $res = mysqli_query($conn, $sql);
                                  
                                  if (mysqli_num_rows($res) > 0) {
                                      while ($row = mysqli_fetch_assoc($res)) {
                                          if ($row['clicks'] > 0) {
                                              echo "<img class='img-thumbnail' alt='" . $row['description'] . "' src='https://res.cloudinary.com/htqimzujb/image/upload/" . $row['file_name'] . "'>" . $row['total'] . "</h>";
                                          }
                                      }
                                  }
                                ?>
                            </div>
                        </div>
                        <p>Most Popular</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <a href="src/admin/insert.php">Add New Image</a>
                </div>
                <div class="col-md-2">
                    <a href="src/admin/edit.php">Edit Existing Image</a>
                </div>
                <div class="col-md-2">
                    <a href="src/admin/myaccount.php">My Account</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>