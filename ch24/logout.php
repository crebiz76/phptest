<?php
    session_start();
    
    unset($_SESSION['id']);
    unset($_SESSION['pass']);
    unset($_SESSION['name']);
    unset($_SESSION['nick']);
    unset($_SESSION['level']);

    header("Location:http://localhost/source/ch24/index.php");
?>