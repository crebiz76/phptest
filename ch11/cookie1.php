<?php
    $a = setcookie("userid", "crebiz");
    // $b = setcookie("Username", "홍길동", time()+60);
    $b = setcookie("password", "123456", time()+60);

    if($a && $b)
    {
        print "쿠키 'userid'와 'password' 생성 완료!<br>";
        print "쿠키 'password'은 60초(1분)간 지속됨!<br>";
    }
?>