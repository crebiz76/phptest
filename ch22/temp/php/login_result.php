<?php
    session_start();
    
    $id = $_REQUEST["id"];
    $pass = $_REQUEST["pass"];
    // $level = $_REQUEST["level"];
    
    require_once("./MyDB.php");
    $pdo = db_connect();

    try{
        $sql = "select * from members where id=?";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $id);
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
    else if($pass != $row["pass"])
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
?>
        <script>
            console.log(`id: <?=$_SESSION['id'] ?> `);
            console.log(`name: <?=$_SESSION['name'] ?> `);
            console.log(`nick: <?=$_SESSION['nick'] ?> `);
            console.log(`level: <?=$_SESSION['level'] ?> `);
        </script>
<?php
        if(isset($_REQUEST["chkbox"]))
        {
            $a = setcookie("id", $id, time()+60*60*24);
            $b = setcookie("pass", $pass, time()+60*60*24);
        }
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $name;
        $_SESSION["nick"] = $nick;
        $_SESSION["level"] = $level;
?>
        <script>
            console.log(`id: <?=$_SESSION['id'] ?> `);
            console.log(`name: <?=$_SESSION['name'] ?> `);
            console.log(`nick: <?=$_SESSION['nick'] ?> `);
            console.log(`level: <?=$_SESSION['level'] ?> `);
        </script>
<?php
        header("Location:http://localhost/source/ch22/php/index.php");
        exit;
    }
?>
    