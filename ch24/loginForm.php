<?php
    // session_start();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="./css/common.css" type="text/css"> -->
</head>
<body>
<!-- header -->
    <header>
        <?php include "header.php" ?>
    </header>
<!-- nav -->
    <nav>
        <?php include "nav.php" ?>
    </nav>
<!-- section -->
<!-- article -->
    <article class="login_form">
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
        <?php
            }
        ?>
    </article>
    <article class="join_form">
    </article>
    <article class="logout_form">
    </article>
    <article class="update_form">
    </article>
    <article class="memo_form">
    </article>
<!-- footer -->
    
<script src="js/common.js"></script>
</body>
</html>