<?php
    // session_start();
    $num = $_REQUEST['num'];

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
    <?php
        try{
            $sql = "select * from greet where num=?";
            $stmh = $pdo -> prepare($sql);
            $stmh -> bindValue(1, $num, PDO::PARAM_STR);
            $stmh -> execute();
            $count = $stmh -> rowCount();

            if($count < 1){
                print "검색 결과가 없습니다. <br>";
            }else{
                $row = $stmh -> fetch(PDO::FETCH_ASSOC);
                $item_subject = $row['subject'];
                $item_content = $row['content'];
    ?>
        <form name="board_form" method="post" action="insertGreet.php?mode=modify&num=<?= $num ?>">
            <div id="update_form">
                <div id="update_row1">
                    <div class="col1">닉네임</div>
                    <div class="col2"><?=$_SESSION['nick'] ?></div>
                    <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
                </div>
                <div id="update_row2">
                    <div class="col1">제목</div>
                    <div class="col2"><input type="text" name="subject" value="<?= $item_subject ?>" required></div>
                </div>
                <div id="update_row3">
                    <div class="col1">내용</div>
                    <div class="col2"><textarea name="content" cols="79" rows="15" required><?= $item_content ?></textarea></div>
                </div>
            </div>
            <div id="update_btn"><button type="submit" name="update">수정하기</button></div>
        </form>
    <?php
            }
        } catch(PDOException $Exception){
            print "오류: ".$Exception -> getMessage();
        }
    ?>
    </article>
    <!-- footer -->
        
    <script src="js/common.js"></script>
</body>
</html>