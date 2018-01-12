<?php 

    require '../Cloudinary/Cloudinary.php';
    require '../Cloudinary/Api.php';
    
    include '../../Cloudinary_API/cloudinary_connection.php';
    include '../../database/db_connection.php';

    include '../../database/db_connection.php';
    
    $sql = "SELECT file_name FROM images WHERE id=" . (int)$_POST["id"];
                                
    $res = mysqli_query($conn, $sql);
          
      if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
              \Cloudinary\Uploader::destroy($row['file_name']);
          }
      }
    
    $sql = "DELETE FROM images WHERE id=" . (int)$_POST["id"];

    if (mysqli_query($conn, $sql)) {
        // echo "Record deleted successfully";
    } else {
        // echo "Error deleting record: " . mysqli_error($conn);
    }
    

?>