<?php
    session_start();

    $id = $_REQUEST['id'];
    $pass = $_REQUEST['pass'];
    $name = $_REQUEST['name'];
    $nick = $_REQUEST['nick'];
    // $hp = $_REQUEST['hp'];
    // $email = $_REQUEST['email'];
    $hp1 = $_REQUEST['hp1'];
    $hp2 = $_REQUEST['hp2'];
    $hp3 = $_REQUEST['hp3'];
    $email1 = $_REQUEST['email1'];
    $email2 = $_REQUEST['email2'];

    $hp = $hp1."-".$hp2."-".$hp3;
    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d H:i:s");

    // 데이터베이스 연결
    require_once('MyDB.php');
    $pdo = db_connect();

    try{
        // Select 문을 사용할 경우, beginTransaction()은 사용하지 않아도 됨
        // beginTransaction()는 데이터가 변경될 경우에만 사용
        $pdo->beginTransaction();
        $sql = "update members set pass=?, name=?, nick=?, hp=?, email=?, regist_day=? where id=?";
        // $sql = "update members set pass=?, name=?, nick=?, hp=?, email=? where id=?";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $pass,      PDO::PARAM_STR);
        $stmh->bindValue(2, $name,      PDO::PARAM_STR);
        $stmh->bindValue(3, $nick,      PDO::PARAM_STR);
        $stmh->bindValue(4, $hp,        PDO::PARAM_STR);
        $stmh->bindValue(5, $email,     PDO::PARAM_STR);
        $stmh->bindValue(6, $regist_day,PDO::PARAM_STR);
        $stmh->bindValue(7, $id,        PDO::PARAM_STR);
        // $stmh->bindValue(6, $id,        PDO::PARAM_STR);

        $stmh->execute();
        $pdo->commit();
        // print "데이터가 수정되었습니다. <br>";
        header("Location: http://localhost/source/ch23/list.php");
    } catch (PDOException $Exception){
        $pdo->rollBack();
        print "오류 :".$Exception->getMessage();
    }
?>