<?php
    // register_globals = Off 인 경우
    $userid = $_COOKIE["userid"];
    // $username = $_COOKIE[Username];
    $password = $_COOKIE["password"];

    print "쿠키 '아이디': $userid <br>";
    // print "쿠키 'Username': $username <br>";
    print "쿠키 '비밀번호': $password <br>";
?>