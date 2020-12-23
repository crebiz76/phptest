<?php
    // $id = $_REQUEST['id'];
    $question = $_REQUEST['question'];
    $ex1 = $_REQUEST['ex1'];
    $ex2 = $_REQUEST['ex2'];
    $ex3 = $_REQUEST['ex3'];
    $ex4 = $_REQUEST['ex4'];
    $dap = $_REQUEST['dap'];

    // 데이터베이스 연결
    require_once('MyDB.php');
    $pdo = db_connect();

    try{
        $sql = "select id from quiz";
        $stmh = $pdo->query($sql);
        $count = $stmh->rowCount();
        $id = $count + 1;
        
        $pdo->beginTransaction();
        $sql = "insert into quiz(id, question, ex1, ex2, ex3, ex4, dap, reg_data)
                values(?,?,?,?,?,?,?, now())";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $id,        PDO::PARAM_STR);
        $stmh->bindValue(2, $question,  PDO::PARAM_STR);
        $stmh->bindValue(3, $ex1,       PDO::PARAM_STR);
        $stmh->bindValue(4, $ex2,       PDO::PARAM_STR);
        $stmh->bindValue(5, $ex3,       PDO::PARAM_STR);
        $stmh->bindValue(6, $ex4,       PDO::PARAM_STR);
        $stmh->bindValue(7, $dap,       PDO::PARAM_STR);
        $stmh->execute();
        $pdo->commit();
        print "데이터가 추가되었습니다. <br>";
        header("Location: http://localhost/source/ch19/insertForm.php");
    } catch (PDOException $Exception){
        $pdo->rollBack();
        print "오류 :".$Exception->getMessage();
    }
?>