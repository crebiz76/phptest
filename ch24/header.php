<?php
    session_start();
?>

<div class="home">
            <a href="./index.php" id="logo"><h1>HOME</h1></a>
        </div>
        <div class="info">
    <?php
        // 로그인 되어 있지 않은 경우
        if(!isset($_SESSION['id']))
        {
    ?>
            <button type="button" id="1" ><a href="loginForm.php" style="text-decoration:none">로그인</a></button>
            <button type="button" id="2" ><a href="insertForm.php" style="text-decoration:none">회원가입</a></button>
    <?php
        }
        // 로그인 되어 있는 경우
        else
        {
    ?>
            <?=$_SESSION['id'] ?> (Level: <?=$_SESSION['level'] ?>) | 
            <!-- <a href="./logout.php">로그아웃</a> | <a href="./updateForm.php?id=<?=$_SESSON['id']?>">정보수정</a> -->
            <button type="button" id="3" onclick="activateArticle(this.id)"><a href="logout.php" style="text-decoration:none">로그아웃</a></button>
            <button type="button" id="4" onclick="activateArticle(this.id)"><a href="updateForm.php?id=<?=$_SESSION['id']?>" style="text-decoration:none">정보수정</a></button>
    <?php
        }
    ?>
</div>