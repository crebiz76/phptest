<?php
    // 데이터베이스 연결
    require_once('MyDB.php');
    $pdo = db_connect();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>퀴즈 목록</title>
</head>
<body>
<?php
    try{
        $sql = "select * from quiz";
        $stmh = $pdo->query($sql);
        $count = $stmh->rowCount();
        print "검색결과는 $count 건입니다. <br>";        
    } catch (PDOException $Exception){
        print "오류 :".$Exception->getMessage();
    }
    
    // 검색결과가 가입자가 있을 때 화면에 표시
    if($count < 1)
    {
        print "퀴즈 문제가 없습니다. <br>";
    }
    else
    {
?>
        <p>퀴즈출제</a>
        </p>
        <table border="1" width="800">
            <tr align="center">
                <th>번호</th>
                <th>제목</th>
                <th>출제일시</th>
                <th>삭제</th>
            </tr>
    <?php
        while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr align="center">
                <td><?=$row['id']?></td>
                <td><?=$row['question']?></td>
                <td><?=$row['reg_data']?></td>
                <td><a href="delete.php?id=<?=$row['id']?>">삭제</a></td>
            </tr>
    <?php
        }
    ?>
        </table>
    <?php
    }
    ?>
</body>
</html>