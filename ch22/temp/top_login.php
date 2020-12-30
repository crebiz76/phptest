<div id="logo">
    <a href="../index.php" id="logo">
        <img src="../img/logo.gif" alt="logo image">
    </a>
</div>
<div id="moto">
    <img src="../img/moto.png" alt="moto image">
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