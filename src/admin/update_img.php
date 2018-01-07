<?php 

    include '../../database/db_connection.php';
    
    echo $_POST["column"];
    // print_r($_POST);
    
    $sql = "SELECT " . $_POST['column'] . " FROM " . $_POST['table'] . " WHERE id=1";
                    
    $res = mysqli_query($conn, $sql);
    
    $old_img = "";
    
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $old_img = $row[$_POST['column']];
        }
    } 
    
    $target_dir = "../../img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        // echo "ind";
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
            $sql = "UPDATE " . $_POST['table'] . " SET " . $_POST['column'] . "='" . $_FILES["fileToUpload"]["name"] . "' WHERE id=1";

            if (mysqli_query($conn, $sql)) {
                // echo "Record updated successfully";
                // echo $old_img;
                unlink('../../img/' . $old_img);
            } else {
                // echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            // echo "Sorry, there was an error uploading your file.";
        }
    }

?>