<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function login_check(){
            if(!document.login_form.id.value)
            {
                alert("아이디를 입력하세요");
                document.login_form.id.focus();
                return;
            }
            
            if(!document.login_form.pass.value)
            {
                alert("비밀번호를 입력하세요");
                document.login_form.pass.focus();
                return;
            }
            document.login_form.submit();
        }
    </script>
</head>
<body>
    <header>
        <a href="./index.php" id="logo"><h1>HOME</h1></a>
        <div id="top_login">
            <?php
                if(!isset($_SESSION['id']))
                {
            ?>
                    <a href="./login_form.php">로그인</a> | <a href="./insertForm.php">회원가입</a>
            <?php
                }
                else
                {
            ?>
                    <?=$_SESSION['id'] ?> (Level: <?=$_SESSION['level'] ?>) | 
                    <a href="./logout.php">로그아웃</a> | <a href="./updateForm.php">정보수정</a>
            <?php
                }
            ?>
        </div>
    </header>
    <article>
        <?php
            if(!isset($_SESSION['id']))
            {
        ?>
        <form method="POST" action="./login_result.php">
            <input type="text" name="id" placeholder="아이디" required autofocus><br>
            <input type="password" name="pass" placeholder="비밀번호" required><br>
            <input type="checkbox" name="chkbox" value="yes">로그인 상태 유지<br>
            <input type="submit" value="로그인">
        </form>
        <?php
            }
            else
            {
        ?>
        <?=$_SESSION['id'] ?>님, 환영합니다. <br>
        <a href="logout.php">로그아웃</a>
        <?php
            }
        ?>
    </article>
</body>
</html>