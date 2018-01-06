<?php 

    include '../../database/db_connection.php';
    
    $sql = "DELETE FROM images WHERE id=" . (int)$_POST["id"];

    if (mysqli_query($conn, $sql)) {
        // echo "Record deleted successfully";
        unlink($_POST['img_loc']);
    } else {
        // echo "Error deleting record: " . mysqli_error($conn);
    }
    

?>