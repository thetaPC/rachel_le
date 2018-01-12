<?php
    
    include '../../database/db_connection.php';
    
    $cat = $_POST['category'];
    $sql = "SELECT * FROM images WHERE category='$cat'";
                    
    $res = mysqli_query($conn, $sql);
    $records = array();
    
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $records[] = $row;
        }
        echo json_encode($records);
    } 
?>