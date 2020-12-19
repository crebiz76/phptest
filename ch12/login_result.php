<?php
    session_start();
    
    $userid = $_REQUEST["userid"];
    $password = $_REQUEST["password"];
    // $chkbox = $_REQUEST["chkbox"];

    if(($userid == "admin") && ($password == "1234"))
    {
        // print("관리자 로그인");
        $_SESSION["userid"] = $userid;
        header("Location:http://localhost/source/ch12/login_form.php");
        exit;
    }
    else if(($userid == "crebiz") && ($password == "123456"))
    {
        // print("$userid 님, 환영합니다.");
        if(isset($_REQUEST["chkbox"]))
        {
            $a = setcookie("userid", $userid, time()+60*60*24);
            $b = setcookie("password", $password, time()+60*60*24);
        }
        $_SESSION["userid"] = $userid;
        header("Location:http://localhost/source/ch12/login_form.php");
        exit;
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