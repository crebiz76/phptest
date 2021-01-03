<?php
    // session_start();
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
        
        require_once("MyDB.php");
        $pdo = db_connect();

        // 모드: 검색기능
        if(isset($_REQUEST['mode']))
            $mode = $_REQUEST['mode'];
        else
            $mode = "";

        if(isset($_REQUEST['search']))
            $search = $_REQUEST['search'];
        else
            $search = "";

        if(isset($_REQUEST['find']))
            $find = $_REQUEST['find'];
        else
            $find = "";

        if($mode == "search"){
            // if(!$search){
            if($search == ""){
    ?>
            <script>
                alert('검색할 단어를 입력해 주세요.');
                history.back();
            </script>
        <?php
            }
            $sql = "select * from greet where $find like '%$search%' order by num desc";
        }
        else{
            $sql = "select * from greet order by num desc";
        }

        try{
            $stmh = $pdo -> query($sql);
            $count = $stmh -> rowCount();
        // }
        ?>
        <div id="board">
            <form name="board_form" method="post" action="listGreet.php?mode=search">
                <div id="list_search">
                    <div id="list_search1">▷ 총 <?= $count ?> 개의 게시물이 있습니다. </div>
                    <div id="list_search2">
                        <select name="find">
                            <option value="subject">제목</option>
                            <option value="content">내용</option>
                            <option value="nick">닉네임</option>
                            <option value="name">이름</option>
                        </select>
                    </div>
                    <div id="list_search3"><input type="text" name="search"></div>
                    <div id="list_search4"><button type="submit" name="find_btn">검색</div>
                </div>
            </form>
        </div>
        <div class="clear"></div>
        <div id="list_top_title">
            <ul>
                <!-- <li id="list_title1">image1</li>
                <li id="list_title2">image2</li>
                <li id="list_title3">image3</li>
                <li id="list_title4">image4</li>
                <li id="list_title5">image5</li> -->
            </ul>
        </div>
        <div id="list_content">
        <?php
            while($row = $stmh -> fetch(PDO::FETCH_ASSOC)) {
                $item_num = $row['num'];
                $item_id = $row['id'];
                $item_name = $row['name'];
                $item_nick = $row['nick'];
                $item_hit = $row['hit'];
                $item_date = $row['regist_day'];
                $item_date = substr($item_date, 0, 10);
                $item_subject = str_replace(" ", "&nbsp;", $row['subject']);
        ?>
            <div id="list_item">
                <hr width="600px" align="left">
                <div id="list_item1"><?= $item_num ?></div>
                <div id="list_item2"><a href="viewGreet.php?num=<?=$item_num?>"><?= $item_subject ?></a></div>
                <div id="list_item3"><?= $item_nick ?></div>
                <div id="list_item4"><?= $item_date ?></div>
                <div id="list_item5"><?= $item_hit  ?></div>
            </div>
        <?php
            }
        } catch(PDOException $Exception) {
            print "오류: ".$Exception -> getMessage();
        }
        ?>
            <div id="write_btn">
                <a href="listGreet.php">목록</a>
                <?php
                    if(isset($_SESSION['id']))
                    {
                ?>
                        <a href="writeGreetForm.php">글쓰기</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </article>
    <!-- footer -->
        
    <script src="js/common.js"></script>
</body>
</html>