<?php
    session_start();
    
    $userid = $_REQUEST["userid"];
    $password = $_REQUEST["password"];
    $chkbox = $_REQUEST["chkbox"];

    $_SESSION["userid"] = $userid;
        
    if($chkbox == "yes")
    {
        $a = setcookie("userid", $userid, time()+60*60*60);
        $b = setcookie("password", $password, time()+60*60*60);
    }

    if(($userid == "admin") && ($password == "1234"))
    {
        print("관리자 로그인");
    }
    else if(($userid == "crebiz") && ($password == "123456"))
    {
        print("$userid 님, 환영합니다.");
    }
    else
    {
?>
    <script>
        alert("아이디와 비밀번호가 틀립니다. ");
        history.back();
    </script>
<?php
    }
?>