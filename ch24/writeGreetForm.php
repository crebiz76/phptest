<?php
    // session_start();

    require_once("MyDB.php");
    $pdo = db_connect();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </article>
    <article class="join_form">
    </article>
    <article class="logout_form">
    </article>
    <article class="update_form">
    </article>
    <article class="memo_form">
    </article>
    <article class="greet_form">
        <form name="board_form" method="post" action="insertGreet.php">
            <div id="write_form">
                <div id="write_row1">
                    <div class="col1">닉네임</div>
                    <div class="col2"><?=$_SESSION['nick'] ?></div>
                    <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
                </div>
                <div id="write_row2">
                    <div class="col1">제목</div>
                    <div class="col2"><input type="text" name="subject" required></div>
                </div>
                <div id="write_row3">
                    <div class="col1">내용</div>
                    <div class="col2"><textarea name="content" cols="79" rows="15" required></textarea></div>
                </div>
            </div>
            <div id="write_btn"><button type="submit" name="write">글쓰기</button></div>
        </form>
    </article>
    <!-- footer -->
        
    <script src="js/common.js"></script>
</body>
</html>