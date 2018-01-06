<?php

    include '../../database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rachel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/social.css">
    <link rel="stylesheet" href="../../css/admin/dashboard.css">
</head>
<body>
  
    <?php include '../repeats/navbar.php'; ?>
  
    <div class="container dash-section">
        <div class="col-md-12">
            <div class="page-header">
                <a href=""><i class="fa fa-tachometer" aria-hidden="true"></i></a>
                <h2>Hello, Rachel</h2>
            </div>
            <p class="lead"><a href="logout.php">Log out</a></p>
            <hr>
            <div class="row justify-content-center m-bot">
                <div class="col-md-3 parent">
                    <div class="visits">
                        <h>5</h>
                        <p>Visits</p>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1 parent">
                    <div class="popular">
                        <h>this image</h>
                        <p>Most Popular</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <a href="insert.php">Add New Image</a>
                </div>
                <div class="col-md-2">
                    <a href="edit.php">Edit Existing Image</a>
                </div>
                <div class="col-md-2">
                    <a href="myaccount.php">My Account</a>
                </div>
            </div>
        </div>
    
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>