<?php
    session_start();

    // $a = setcookie("userid", "crebiz");
    // $b = setcookie("password", "123456", time()+60);

    print $_SESSION["userid"];
    print "님의 방문을 환영합니다. ";
    
    // if($a && $b)
    // {
    //     print "쿠키 'userid'와 'password' 생성 완료!<br>";
    //     print "쿠키 'password'은 60초(1분)간 지속됨!<br>";
    // }
?>