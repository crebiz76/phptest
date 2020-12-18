<?php
    // 문자열 함수 사용 방법
    $tel = "010-1234-5678";

    // strlen()
    $num_tel = strlen($tel);
    print "strlen() 함수 사용: $num_tel <br>";

    // substr()
    $tel1 = substr($tel, 0, 3);
    $tel2 = substr($tel, 4, 4);
    $tel3 = substr($tel, 9, 4);
    print "substr() 함수 사용: $tel1 $tel2 $tel3 <br>";

    // explode()
    $phone = explode("-", $tel);
    print "explode() 함수 사용: $phone[0] $phone[1] $phone[2] <br>";
?>