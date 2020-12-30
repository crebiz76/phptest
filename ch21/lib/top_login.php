<div id="logo">
    <a href="index.php" id="logo">
        <h1>HEADER</h1>
    </a>
</div>

<div id="top_login">
<?php
    if(!isset($_SESSION['id']))
    {
?>
        <a href="../login/login_form.php">로그인</a> | <a href="./member/insertForm.php">회원가입</a>
<?php
    }
    else
    {
?>
        <?=$_SESSION['id'] ?> (Level: <?=$_SESSION['level'] ?>) | 
        <a href="../login/logout.php">로그아웃</a> | <a href="./member/updateForm.php">정보수정</a>
<?php
    }
?>
</div>