<?php
    // Query string이 id이기 때문에
    $id = $_REQUEST['id'];

    // 데이터베이스 연결
    require_once('MyDB.php');
    $pdo = db_connect();

    try{
        $pdo->beginTransaction();
        $sql = "delete from members where id=?";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $id,    PDO::PARAM_STR);

        $stmh->execute();
        $pdo->commit();
        header("Location: http://localhost/source/ch22/list.php");
    } catch (PDOException $Exception){
        $pdo->rollBack();
        print "오류 :".$Exception->getMessage();
    }
?>