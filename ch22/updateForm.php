<?php
    session_start();
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
        $sql = "select * from members where id=?";
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
        while($row = $stmh->fetch(PDO::FETCH_ASSOC))
        {
            $hp = explode("-", $row['hp']);
            $hp1 = $hp[0];
            $hp2 = $hp[1];
            $hp3 = $hp[2];

            $email = explode("@", $row['email']);
            $email1 = $email[0];
            $email2 = $email[1]; 
?>
        <form method="post" action="updatePro.php">
            <div id="reg-title"> ## 회원정보수정 ## </div>
            <table>
                <tr>
                    <td>* 아이디</td>
                    <td><?=$row['id']?></td>
                </tr>
                <tr>
                    <td>* 비밀번호</td>
                    <td><input type="password" name="pass" size="20" value=<?=$row['pass']?> required></td>
                </tr>
                <tr>
                    <td>* 이름</td>
                    <td><input type="text" name="name" size="20" value=<?=$row['name']?> required></a></td>
                </tr>
                <tr>
                    <td>* 닉네임</td>
                    <td><input type="text" name="nick" size="20" value=<?=$row['nick']?> required></a></td>
                    <td><a href="#"><input type="button" value="닉네임 중복확인"  onclick="check_nick()"></a></button></td>
                </tr>
                <tr>
                    <td>* 휴대폰</td>
                    <td><input type="text" name="hp1" size="20" value="010">-</td>
                    <td><input type="text" name="hp2" size="20" value=<?=$hp2?>>-</td>
                    <td><input type="text" name="hp3" size="20" value=<?=$hp3?>></td>
                </tr>
                <tr>
                    <td>  이메일</td>
                    <td><input type="text" name="email1" size="20" value=<?=$email1?>>@</a></td>
                    <td><input type="text" name="email2" size="20" value=<?=$email2?>></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <!-- <input type="submit" value="수정하기"> -->
                        <input type="submit" value="수정하기" onclick="check_input()">
                        <input type="reset" value="초기화하기" onclick="reset_form()">
                    </td>
                </tr>
            </table>
            <!-- updatePro에서 필요한 id에 대한 정보를 전달 -->
            <input type="hidden" name="id" value="<?=$id?>">
        </form>
    <?php }
    }
    ?>
</body>
</html>