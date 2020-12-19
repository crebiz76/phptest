<?php
    $a = setcookie("userid", "");
    $b = setcookie("password", "");

    if($a && $b)
    {
        print "쿠키 'userid'와 'userpassword' 삭제 완료!";
    }
?>