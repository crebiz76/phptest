<?php
    session_start();
    
    $userid = $_REQUEST["userid"];
    $password = $_REQUEST["password"];
    
    require_once("MyDB.php");
    $pdo = db_connect();

    try{
        $sql = "select passwd from member where id=?";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $userid);
        $stmh->execute();

        $count = $stmh->rowCount();        
    } catch (PDOException $Exception){
        print "오류 :".$Exception->getMessage();
    }
    
    $row=$stmh->fetch(PDO::FETCH_ASSOC);
    // 가입자가 없을 때 
    if($count < 1)
    {
        // print "가입자(수정자)가 없습니다. <br>";
?>
        <script>
            alert("아이디가 틀립니다.");
            history.back();
        </script>
<?php
    }
    // 비밀번호가 틀렸을 때 
    else if($password != $row["passwd"])
    {
?>
        <script>
            alert("비밀번호가 틀립니다.");
            history.back();
        </script>
<?php
    }
    else
    {
        if(isset($_REQUEST["chkbox"]))
        {
            $a = setcookie("userid", $userid, time()+60*60*24);
            $b = setcookie("password", $password, time()+60*60*24);
        }
        $_SESSION["userid"] = $userid;
        header("Location:http://localhost/source/ch20/login_form.php");
        exit;
    }
?>