<?php
    session_start();

    $_SESSION['login'] = "N";
    
    session_unset();
    
    session_destroy();
    
    header('Location: ../../index.php');

?>