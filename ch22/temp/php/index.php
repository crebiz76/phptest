<?php
    session_start();

    if(isset($_SESSION['id']))
    {
        $level = $_REQUEST["level"];
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="./index.php" id="logo"><h1>HOME</h1></a>
        <div id="top_login">
            <?php
                if(!isset($_SESSION['id']))
                {
            ?>
                    <script> console.log("id is not exist") </script>
                    <a href="./login_form.php">로그인</a> | <a href="./insertForm.php">회원가입</a>
            <?php
                }
                else
                {
            ?>
                    <script>
                        console.log(`id is <?=$_SESSION['id'] ?>, level is  <?=$_SESSION['level'] ?>`);
                     </script>
                    <?=$_SESSION['id'] ?> (Level: <?=$_SESSION['level'] ?>) | 
                    <a href="./logout.php">로그아웃</a> | <a href="./updateForm.php?id=<?=$_SESSON['id']?>"> 정보수정</a>

            <?php
                }
            ?>
        </div>
    </header>
    <article></article>
    <!-- <script src="./js/common.js"></script> -->
</body>
</html>