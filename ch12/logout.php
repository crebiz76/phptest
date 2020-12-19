<?php
    // echo "또 만나요.";
    // sleep(5);
    // header("Location:http://localhost/source/ch12/login_form.php");
    // exit;
    session_start();
    
    unset($_SESSION['userid']);
    unset($_SESSION['password']);

    setcookie("userid", "");
    setcookie("password", "");

    header("Location:http://localhost/source/ch12/login_form.php");
?>