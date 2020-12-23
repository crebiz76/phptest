<?php
    // Query string이 id이기 때문에
    $id = $_REQUEST['id'];

    // 데이터베이스 연결
    require_once('MyDB.php');
    $pdo = db_connect();

    try{
        // beginTransaction()는 select 문 외에는 다 필요함
        $pdo->beginTransaction();
        $sql = "delete from member where id=?";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $id,    PDO::PARAM_STR);

        $stmh->execute();
        $pdo->commit();
        // print "데이터가 삭제되었습니다. <br>";
        // sleep(10);
        header("Location: http://localhost/source/ch20/list.php");
    } catch (PDOException $Exception){
        $pdo->rollBack();
        print "오류 :".$Exception->getMessage();
    }
?>