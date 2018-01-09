<?php

    include 'db_connection.php';
    
    $sql = "SELECT table_schema, sum( data_length + index_length ) / 1024 / 1024 'database size in MB' FROM information_schema.TABLES";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
    
        echo $row['database size in MB'];
    }

?>