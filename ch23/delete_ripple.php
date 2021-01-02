<?php
    // Query string이 id이기 때문에
    $num = $_REQUEST['num'];

    // 데이터베이스 연결
    require_once('MyDB.php');
    $pdo = db_connect();

    try{
        $pdo->beginTransaction();
        $sql = "delete from memo_ripple where num=?";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $num,    PDO::PARAM_STR);

        $stmh->execute();
        $pdo->commit();
        header("Location: http://localhost/source/ch23/memoForm.php");
    } catch (PDOException $Exception){
        $pdo->rollBack();
        print "오류 :".$Exception->getMessage();
    }
?>