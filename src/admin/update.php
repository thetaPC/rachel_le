<?php 

    include '../../database/db_connection.php';
    
    $sql = "UPDATE images SET name='" . $_POST["name"] . "', description='" . $_POST["description"] . "', month='" . $_POST["month"] . "', year='" . $_POST["year"] . "', slideshow='" . $_POST["slide"] . "', category='" . $_POST["category"] . "' WHERE id=" . (int)$_POST["id"];

    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully";
    } else {
        // echo "Error updating record: " . mysqli_error($conn);
    }

?>