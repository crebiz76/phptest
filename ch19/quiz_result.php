<?php
    $ans = array($_REQUEST['ex1'], $_REQUEST['ex2'], $_REQUEST['ex3']);

    require_once('MyDB.php');
    $pdo = db_connect();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>퀴즈 응시 결과</title>
</head>
<body>
    <h2>퀴즈 응시 결과</h2>
<?php
    try{
        $sql = "select * from quiz";
        $stmh = $pdo->query($sql);
        $count = $stmh->rowCount();     
    } catch (PDOException $Exception){
        print "오류 :".$Exception->getMessage();
    }
    
    $i = 0;
    $score = 0;
    while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
        if($ans[$i] == $row['dap'])
        {
            $score++;
            $correct[$i] = 'O';
        }
        else
        {
            $correct[$i] = 'X';
        }
        $i++;
    }
    
    $result = '';
    switch($score)
    {
        case 0: 
        case 1: $result = '미흡'; break;
        case 2: $result = '보통'; break;
        case 3: $result = '우수'; break;
    }

?>
    <p>판정: <?=$result?></p>
    <table border="1">
        <tr>
            <td width="100" align="center">순번</td>
            <td width="100" align="center">선택</td>
            <td width="100" align="center">정답</td>
            <td width="100" align="center">결과</td>
        </tr>
<?php
    try{
        $sql = "select * from quiz";
        $stmh = $pdo->query($sql);
        $count = $stmh->rowCount();     
    } catch (PDOException $Exception){
        print "오류 :".$Exception->getMessage();
    }

    $j = 0;
    while($row=$stmh->fetch(PDO::FETCH_ASSOC)){
?>
        <tr>
            <td width="100" align="center"><?=$row['id']?></td>
            <td width="100" align="center"><?=$ans[$j]?></td>
            <td width="100" align="center"><?=$row['dap']?></td>
            <td width="100" align="center"><?=$correct[$j]?></td>
        </tr>
<?php
        $j++;
    }
?>
    </table>
</body>
</html>