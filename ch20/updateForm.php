<?php
    $id = $_REQUEST['id'];

    // 데이터베이스 연결
    require_once('MyDB.php');
    $pdo = db_connect();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 정보 수정</title>
</head>
<body>
<?php
    try{
        $sql = "select * from member where id=?";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $id);
        $stmh->execute();

        $count = $stmh->rowCount();
        // print "검색결과는 $count 건입니다. <br>";        
    } catch (PDOException $Exception){
        print "오류 :".$Exception->getMessage();
    }
    
    // 검색결과가 가입자가 있을 때 화면에 표시
    if($count < 1)
    {
        print "가입자(수정자)가 없습니다. <br>";
    }
    else
    {
        $row=$stmh->fetch(PDO::FETCH_ASSOC);
?>
        <form method="post" action="updatePro.php">
            <table border="1">
                <tr>
                    <!-- 이메일(id) 부분은 Primary Key 부분이므로, 수정하지 못하게 한다.  -->
                    <td>이메일</td>
                    <td><?=$row['id']?></td>
                </tr>
                <tr>
                    <td>비밀번호</td>
                    <td><input type="password" name="passwd" size="20" value=<?=$row['passwd']?> required></td>
                </tr>
                <tr>
                    <td>이름</td>
                    <td><input type="text" name="name" size="20" value=<?=$row['name']?> required></td>
                </tr>
                <tr>
                    <td>전화번호</td>
                    <td><input type="text" name="tel" size="20" value=<?=$row['tel']?>></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="수정하기">
                    </td>
                </tr>
            </table>
            <!-- updatePro에서 필요한 id에 대한 정보를 전달 -->
            <input type="hidden" name="id" value="<?=$id?>">
        </form>  
    <?php
    }
    ?>
</body>
</html>