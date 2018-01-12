<?php 

    require '../Cloudinary/Cloudinary.php';
    require '../Cloudinary/Uploader.php';
    require '../Cloudinary/Api.php';
    
    include '../../Cloudinary_API/cloudinary_connection.php';
    include '../../database/db_connection.php';
    
    $sql = "SELECT " . $_POST['column'] . " FROM " . $_POST['table'] . " WHERE id=1";
                    
    $res = mysqli_query($conn, $sql);
    
    $old_img = "";
    
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $old_img = $row[$_POST['column']];
        }
    } 
    
    $uploadOk = 1;
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
    } else {
        $res = \Cloudinary\Uploader::upload($_FILES["fileToUpload"]["tmp_name"]);
        
        $sql = "UPDATE " . $_POST['table'] . " SET " . $_POST['column'] . "='" . (string)$res['public_id'] . "' WHERE id=1";

        if (mysqli_query($conn, $sql)) {
            // echo "Record updated successfully";
            \Cloudinary\Uploader::destroy($old_img);
            header('Content-Type: application/json');
            echo json_encode(array('newImgName' => (string)$res['public_id']));
        } else {
            // echo "Error updating record: " . mysqli_error($conn);
        }
        
    }

?>