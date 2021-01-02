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
        $sql = "select * from members";
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
        <a href="index.php">HOME</a><br>
        <table border="1" width="800">
            <tr align="center">
                <th>아이디</th>
                <th>비밀번호</th>
                <th>이름</th>
                <th>닉네임</th>
                <th>핸드폰</th>
                <th>이메일</th>
                <th>가입일자</th>
                <th>수정</th>
                <th>삭제</th>
            </tr>
    <?php
        while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr align="center">
                <td><?=$row['id']?></td>
                <td><?=$row['pass']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['nick']?></td>
                <td><?=$row['hp']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['regist_day']?></td>
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