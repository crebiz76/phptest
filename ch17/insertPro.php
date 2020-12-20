<?php
    $id = $_REQUEST['id'];
    $passwd = $_REQUEST['passwd'];
    $name = $_REQUEST['name'];
    $tel = $_REQUEST['tel'];

    // 데이터베이스 연결
    require_once('MyDB.php');
    $pdo = db_connect();

    try{
        // Select 문을 사용할 경우, beginTransaction()은 사용하지 않아도 됨
        // beginTransaction()는 데이터가 변경될 경우에만 사용
        $pdo->beginTransaction();
        $sql = "insert into member(id, passwd, name, tel, created)
                values(?,?,?,?, now())";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $id,    PDO::PARAM_STR);
        $stmh->bindValue(2, $passwd,PDO::PARAM_STR);
        $stmh->bindValue(3, $name,  PDO::PARAM_STR);
        $stmh->bindValue(4, $tel,   PDO::PARAM_STR);
        $stmh->execute();
        $pdo->commit();
        print "데이터가 추가되었습니다. <br>";
        // sleep(10);
        header("Location: http://localhost/source/ch17/insertForm.php");
    } catch (PDOException $Exception){
        $pdo->rollBack();
        print "오류 :".$Exception->getMessage();
    }
?>