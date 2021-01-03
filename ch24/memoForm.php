<?php
    // session_start();

    require_once("./MyDB.php");
    $pdo = db_connect();

    try{
        $sql = "select * from memo order by num desc";
        $stmh = $pdo -> query($sql);
    }
    catch (PDOException $Exception){
        print "오류: ".$Exception->getMessage();
    }
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
    </article>
    <article class="join_form">
    </article>
    <article class="logout_form">
    </article>
    <article class="update_form">
    </article>
    <article class="memo_form">
        <?php
        if(isset($_SESSION['id'])){ 
        ?>
        <div id="memo_write">
            <form name="memo_form" method="post" action="insertMemo.php">
                <div id="memo_writer"><span>▷ <?=$_SESSION['nick'] ?></span></div>
                <div id="memo_text"><textarea name="content" cols="86" rows="6" required></textarea></div>
                <div id="memo_btn"><button>저장하기</button></div>
            </form>
        </div>        
        <hr width="600px" align="left">
        <?php
        }

            while($row = $stmh -> fetch(PDO::FETCH_ASSOC)) {
                $memo_id = $row['id'];
                $memo_num = $row['num'];
                $memo_date = $row['regist_day'];
                $memo_nick = $row['nick'];
                $memo_content = str_replace("\n", "<br>", $row['content']);
                $memo_content = str_replace(" ", "&nbsp;", $memo_content);
        ?>    
        <div id="memo_writer_history">
            <ul>
                <li id="writer_title1"><?=$memo_num ?></li>
                <li id="writer_title2"><?=$memo_nick ?></li>
                <li id="writer_title3"><?=$memo_date ?></li>
                <li id="writer_title4">
                <?php
                if(isset($_SESSION['id'])){
                    if(($_SESSION['id'] == 'admin') || ($_SESSION['id'] == $memo_id)){
                        print "<a href='deleteMemo.php?num=$memo_num'>[삭제]</a>";
                    }
                }
                ?> 
                </li>
            </ul>        
        </div>
        <div id="memo_content"><?=$memo_content ?>
        <hr width="600px" align="left">
        </div>
        <!-- 댓글이 없는 경우 댓글 부분 표시 안 되도록 함 -->
        <div id="ripple">
        <?php
                try{
                    $sql = "select * from memo_ripple where parent='$memo_num'";
                    $stmh1 = $pdo->query($sql);
            
                    $count1 = $stmh1->rowCount();
                    // print "검색결과는 $count1 건입니다. <br>";     
                } catch (PDOException $Exception){
                    print "오류 :".$Exception->getMessage();
                }
                
                // 검색결과가 가입자가 있을 때 화면에 표시
                if($count1 > 0)
                {
        ?>
                    <div id="ripple1">댓글
                    <hr width="300px" align="left">
        <?php
                }
        ?>
            </div>
            <div id="ripple2">
                <?php
                try{
                    $sql = "select * from memo_ripple where parent='$memo_num'";
                    $stmh2 = $pdo -> query($sql);
                } catch(PDOException $Exception){
                    print "오류: ".$Exception -> getMessage();
                }

                while($row_ripple = $stmh2 -> fetch(PDO::FETCH_ASSOC)){
                    $ripple_num = $row_ripple['num'];
                    $ripple_id = $row_ripple['id'];
                    $ripple_nick = $row_ripple['nick'];
                    $ripple_content = str_replace("\n", "<br>", $row_ripple['content']);
                    $ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
                    $ripple_date = $row_ripple['regist_day'];
                ?>
                <div id="ripple_title">
                    <ul>
                        <li><?= $ripple_nick ?> &nbsp;&nbsp;&nbsp; <?= $ripple_date ?></li>
                        <li id="mdi_del">
                            <?php
                            if(isset($_SESSION['id'])){
                                if(($_SESSION['id'] == 'admin') || ($_SESSION['id'] == $memo_id)){
                                    print "<a href='deleteMemo.php?num=$memo_num'>[삭제]</a>";
                                }
                            }
                            ?>          
                        </li>
                    </ul>
                </div>
                <div id="ripple_content"><?= $ripple_content ?>
                <hr width="300px" align="left">
                </div>
                <?php
                }
                ?>
                <?php
                    if(isset($_SESSION['id'])){
                ?>
                    <form name="ripple_form" method="post" action="insert_ripple.php">
                        <input type="hidden" name="num" value="<?=$memo_num ?>">
                        <div id="ripple_insert">
                            <div id="ripple_textarea">
                                <textarea name="ripple_content" cols="80" rows="3" required></textarea>
                            </div>
                            <div id="ripple_btn"><button>저장하기</button></div>
                        </div>                
                    </form>        
                </div>
            </div>
        </div>
        <?php       
                }
            }
        ?>
    </article>
<!-- footer -->
    
<script src="js/common.js"></script>
</body>
</html>