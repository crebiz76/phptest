<header>
    <div class="home">
        <a href="./index.php" id="logo"><h1>HOME</h1></a>
    </div>
    <div class="info">
<?php
    // 로그인 되어 있지 않은 경우
    if(!isset($_SESSION['id']))
    {
?>
        <a href="./login_form.php">로그인</a> | <a href="./insertForm.php">회원가입</a>      
<?php
    }
    // 로그인 되어 있는 경우
    else
    {
?>
        <?=$_SESSION['id'] ?> (Level: <?=$_SESSION['level'] ?>) | 
        <a href="./logout.php">로그아웃</a> | <a href="./updateForm.php?id=<?=$_SESSON['id']?>">정보수정</a>
<?php
    }
?>
    </div>
</header>