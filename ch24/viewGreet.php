<?php
    // session_start();

    $num = $_REQUEST['num'];
    require_once('MyDB.php');
    $pdo = db_connect();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="./css/common.css" type="text/css"> -->
    <script>
        function del(href)
        {
            if(confirm("한 번 삭제한 자료는 복구할 수 없습니다. \n\n 정말 삭제하시겠습니까?"))
            {
                document.location.href = href;
            }
        }
    </script>
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

            // while($row = $stmh -> fetch(PDO::FETCH_ASSOC)){
            $row = $stmh -> fetch(PDO::FETCH_ASSOC)    ;
            $item_num = $row['num'];
            $item_id = $row['id'];
            $item_name = $row['name'];
            $item_nick = $row['nick'];
            $item_subject = str_replace(" ", "&nbsp;", $row['subject']);
            $item_content = $row['content'];
            $item_date = $row['regist_day'];
            $item_date = substr($item_date, 0, 10);
            $item_hit = $row['hit'];
            $is_html = $row['is_html'];
            
            if($is_html != "y"){
                $item_content = str_replace(" ", "&nbsp;", $item_content);
                $item_content = str_replace("\n", "<br>", $item_content);
            }

            $new_hit = $item_hit+1;
            
            try{
                $pdo -> beginTransaction();
                $sql = "update greet set hit=? where num=?";
                $stmh = $pdo -> prepare($sql);
                $stmh -> bindValue(1, $new_hit, PDO::PARAM_STR);
                $stmh -> bindValue(2, $num, PDO::PARAM_STR);
                $stmh -> execute();
                $pdo -> commit();
            } catch(PDOException $Exception){
                $pdo -> rollBack();
                print "오류 : ".$Exception -> getMessage();
            }
    ?>
        <div id="view_title">
            <div id="view_title1"><?= $item_subject ?></div>
            <div id="view_title2"><?= $item_nick ?> | 조회: <?= $item_hit ?> | <?= $item_date ?></div>
        </div>
        <div id="view_content"><?= $item_content ?></div>
            <a href="listGreet.php">목록</a>&nbsp;
        <?php
            if(isset($_SESSION['id']))
            {
                if(($_SESSION['id'] == $item_id) || ($_SESSION['id'] == "admin"))           
                {
        ?>
            <a href="modifyGreetForm.php?num=<?= $num ?>">수정</a>&nbsp;
            <a href="javascript:del('deleteGreet.php?num=<?= $num ?>')">삭제</a>&nbsp;
        <?php
                }
        ?>
            <a href="writeGreetForm.php">작성</a>
        <?php
            }
        }
        catch(PDOException $Exception) {
            print "오류: ".$Exception -> getMessage();
        }
        ?>
    </article>
<!-- footer -->
    
<script src="js/common.js"></script>
</body>
</html>