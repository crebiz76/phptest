<?php
    // Query string이 id이기 때문에
    $id = $_REQUEST['id'];

    // 데이터베이스 연결
    require_once('MyDB.php');
    $pdo = db_connect();

    try{
        $sql = "select id from quiz";
        $stmh = $pdo->query($sql);
        $count = $stmh->rowCount();
        
        if($id == $count)
        {
            $pdo->beginTransaction();
            $sql = "delete from quiz where id=?";
            $stmh = $pdo->prepare($sql);
            $stmh->bindValue(1, $id,    PDO::PARAM_STR);

            $stmh->execute();
            $pdo->commit();
            header("Location: http://localhost/source/ch19/list.php");
        }
        else
        {
?>
            <script>
                alert("마지막 문제부터 삭제할 수 있습니다. ");
                history.back();
            </script>
<?php
        }
    } catch (PDOException $Exception){
        $pdo->rollBack();
        print "오류 :".$Exception->getMessage();
    }
?>