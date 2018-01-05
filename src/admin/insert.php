<?php

    include '../../database/db_connection.php';
    
    $target_dir = "../../img/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            // echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo $_POST["name"] . " " . $_POST["description"] . " " . $_POST["category"] . " " . $_POST["slide"];
            if(isset($_POST['slide'])) {
                $sql = "INSERT INTO images (name, description, category, file_name, slideshow, year, month) VALUES ('" . $_POST["name"] . "', '" . $_POST["description"] . "', '" . $_POST["category"] . "', '" . $_FILES["fileToUpload"]["name"] . "', '" . $_POST["slide"] . "', '" . $_POST["year"] . "', '" . $_POST["month"] . "')";
            } else {
                $sql = "INSERT INTO images (name, description, category, file_name, year, month) VALUES ('" . $_POST["name"] . "', '" . $_POST["description"] . "', '" . $_POST["category"] . "', '" . $_FILES["fileToUpload"]["name"] . "', '" . $_POST["year"] . "', '" . $_POST["month"] . "')";
            }
            
            if (mysqli_query($conn, $sql)) {
                // echo "New record created successfully";
            } else {
                // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            // echo "Sorry, there was an error uploading your file.";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rachel - Insert</title>
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
                <a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i></a>
                <h2>Hello, Rachel</h2>
            </div>
            <p class="lead"><a href="logout.php">Log out</a></p>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" name="description" class="form-control" id="desc">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="month">Month</label>
                                    <input type="number" name="month" class="form-control" id="month" required>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number" name="year" class="form-control" id="year" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" class="custom-select" required name="category">
                                        <option selected value="">Select...</option>
                                        <option value="digital">Digital</option>
                                        <option value="abstract">Abstract</option>
                                        <option value="traditional">Traditional</option>
                                        <option value="logos">Logos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-check">
                                    <label class="form-check-label">
                                    <input name="slide" class="form-check-input" type="checkbox" value="1">
                                    Slideshow?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fileToUpload">Select image to upload:</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                            <!--<input type="submit" value="Upload Image" name="submit">-->
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </center>
                    </form> 
                </div>
            </div>
        </div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>