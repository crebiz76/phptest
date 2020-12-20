<?php
    $id = $_REQUEST['id'];
    $passwd = $_REQUEST['passwd'];
    $name = $_REQUEST['name'];
    $tel = $_REQUEST['tel'];

    $db_user = "crebiz";
    $db_pass = "123456";
    $db_host = "localhost";
    $db_name = "phptest";
    $db_type = "mysql";
    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8;";
    
    try{
        // 데이터베이스 연결
        $pdo = new PDO($dsn, $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        print "데이터베이스에 접속하였습니다. ";
    } catch (PDOException $Exception){
        die('오류: '.$Exception->getMessage());
    }

    try{
        $pdo->beginTransaction();
        $sql = "insert into member(id, passwd, name, tel, created)
                values(:id, :passwd, :name, :tel, :created)";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(':id',     $id,        PDO::PARAM_STR);
        $stmh->bindValue(':passwd', $passwd,    PDO::PARAM_STR);
        $stmh->bindValue(':name',   $name,      PDO::PARAM_STR);
        $stmh->bindValue(':tel',    $tel,       PDO::PARAM_STR);
        $stmh->bindValue(':created',"now()",    PDO::PARAM_STR);
        $stmh->execute();
        $pdo->commit();
        print "데이터가 추가되었습니다. ";
    } catch (PDOException $Exception){
        $pdo->rollBack();
        print "오류 :".$Exception->getMessage();
    }
?>