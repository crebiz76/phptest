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
    <title>회원 관리</title>
</head>
<body>
<?php
    try{
        $sql = "select * from member";
        $stmh = $pdo->query($sql);

        $count = $stmh->rowCount();
        print "검색결과는 $count 건입니다. <br>";        
    } catch (PDOException $Exception){
        print "오류 :".$Exception->getMessage();
    }
    
    // 검색결과가 가입자가 있을 때 화면에 표시
    if($count < 1)
    {
        print "가입자가 없습니다. <br>";
    }
    else
    {
?>
        <table border="1" width="800">
            <tr align="center">
                <th>이메일</th>
                <th>비밀번호</th>
                <th>이름</th>
                <th>전화번호</th>
                <th>가입일시</th>
                <th>수정</th>
                <th>삭제</th>
            </tr>
    <?php
        while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr align="center">
                <td><?=$row['id']?></td>
                <td><?=$row['passwd']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['tel']?></td>
                <td><?=$row['created']?></td>
                <td><a href="updateForm.php?id=<?=$row['id']?>">수정</a></td>
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