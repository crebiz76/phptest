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
    <title>퀴즈 페이지</title>
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
        while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
?>
    <form method="post" action="quiz_result.php">
        <table border="1">
            <tr>
                <td width="50" align="center"><?=$row['id']?></td>
                <td width="750"><?=$row['question']?></td>
            </tr>
            <tr>
                <td width="50" align="center"><input type="radio" name="ex<?=$row['id']?>" value="1"></td>
                <td width="750"><?=$row['ex1']?></td>
            </tr>
            <tr>
                <td width="50" align="center"><input type="radio" name="ex<?=$row['id']?>" value="2"></td>
                <td width="750"><?=$row['ex2']?></td>
            </tr>
            <tr>
                <td width="50" align="center"><input type="radio" name="ex<?=$row['id']?>" value="3"></td>
                <td width="750"><?=$row['ex3']?></td>
            </tr>
            <tr>
                <td width="50" align="center"><input type="radio" name="ex<?=$row['id']?>" value="4"></td>
                <td width="750"><?=$row['ex4']?></td>
            </tr>
        </table>
        <br>
<?php
        }
?>
        <div width="800"><input type="submit" value="답안 제출 하기"></div>
    </form>
<?php
    }
?>
</body>
</html>