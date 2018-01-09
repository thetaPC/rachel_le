<?php 
    include '../../database/db_connection.php';
    
    $sql = "UPDATE images SET clicks= clicks + 1 WHERE id=" . (int)$_POST["id"];
    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully";
    } else {
        // echo "Error updating record: " . mysqli_error($conn);
    }
    
?>