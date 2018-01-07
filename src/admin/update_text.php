<?php 

    include '../../database/db_connection.php';
    
    echo $_POST["column"] . " " . $_POST["new_text"];
    // print_r($_POST);
    
    $sql = "UPDATE " . $_POST['table'] . " SET " . $_POST['column'] . "='" . $_POST["new_text"] . "' WHERE id=1";

    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully";
    } else {
        // echo "Error updating record: " . mysqli_error($conn);
    }

?>