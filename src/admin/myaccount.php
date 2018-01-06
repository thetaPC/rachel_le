<?php

    include '../../database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rachel - My Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/social.css">
    <link rel="stylesheet" href="../../css/admin/dashboard.css">
    <link rel="stylesheet" href="../../css/admin/myaccount.css">
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
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <a href="#" class="" role="button">Profile Picture</a><br>
                        <a href="#" class="" role="button">Biography</a><br>
                        <a href="#" class="" role="button">Website Logo</a><br>
                        <a href="#" class="" role="button">Password</a><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                        $sql = "SELECT * FROM my_account WHERE id=1";
                        $res = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "<img src='../../img/" . $row["profile_img"] . "' class='img-fluid' alt='Rachel Le'>";
                            }
                            
                        } 
                    ?>
                    <!--<img src="../../img/rach1.jpg" class="img-fluid" alt="Rachel Le"> -->
                    <form id="updateProfImg" data-id="" class="" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fileToUpload">Select image to upload:</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                            <!--<input type="submit" value="Upload Image" name="submit">-->
                        </div>
                        <center>
                            <button type="submit" id="upd" class="btn btn-primary">Update</button>
                        </center>
                    </form> 
                    <form id="updateBio" data-id="" class="" method="POST" action="">
                        <div class="form-group">
                            <label for="bio">Biography:</label>
                            <textarea class="form-control" id="bio" rows="3"><?php
                                    $sql = "SELECT * FROM my_account WHERE id=1";
                                    $res = mysqli_query($conn, $sql);
                                    
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            echo $row["bio"];
                                        }
                                        
                                    } 
                                ?></textarea>
                        </div>
                        <center>
                            <button type="submit" id="updBio" class="btn btn-primary">Update</button>
                        </center>
                    </form> 
                    <?php
                        $sql = "SELECT * FROM my_account WHERE id=1";
                        $res = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "<img src='../../img/" . $row["logo"] . "' class='img-fluid' alt='Rachel Le'>";
                            }
                            
                        } 
                    ?>
                    <form id="updateLogo" data-id="" class="" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fileToUpload">Select image to upload:</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                            <!--<input type="submit" value="Upload Image" name="submit">-->
                        </div>
                        <center>
                            <button type="submit" id="updLo" class="btn btn-primary">Update</button>
                        </center>
                    </form> 
                    <form id="updateBio" data-id="" class="" method="POST" action="">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="pass">Enter new password:</label>
                                <input type="password" class="form-control" id="pass" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="pass">Enter new password again:</label>
                                <input type="password" class="form-control" id="pass" placeholder="Password">
                            </div>
                        </div>
                        <center>
                            <button type="submit" id="updBio" class="btn btn-primary">Update</button>
                        </center>
                    </form> 
                </div>
            </div>
        </div>
    
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
        $('#upd').on('click', function(e) {
            e.preventDefault();
            let formData = new FormData($("#updateProfImg")[0])
            $.ajax({
                type: "POST",
                url: "update_img.php",
                dataType: "json",
                processData: false,
                contentType: false,
                data: formData,
                success: function(data,status) {
                    // alert("ADDED!");
                    
                },
                  complete: function(data,status) { //optional, used for debugging purposes
                  console.log('done');
                }
            });//AJAX 
        });
    </script>
</body>