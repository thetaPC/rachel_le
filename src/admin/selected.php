<?php
    
    include '../../database/db_connection.php';
    
    $id = $_POST['id'];
    $sql = "SELECT * FROM images WHERE id='$id'";
                    
    $res = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo json_encode($row);
        }
        
    } 
?>