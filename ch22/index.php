<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/common.css" type="text/css">
</head>
<body>
<!-- header -->
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
            <button type="button" id="1" onclick="activateArticle(this.id)">로그인</button>
            <button type="button" id="2" onclick="activateArticle(this.id)">회원가입</button>
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
    </header>
<!-- nav -->
    <nav>
        <ul class="nav-items">
            <li>낙서장</li>
            <li>가입인사</li>
            <li>연주회</li>
            <li>자료실</li>
            <li>게시판</li>
            <li>레슨문의</li>
            <li>설문조사</li>
        </ul>
    </nav>
<!-- section -->
<!-- article -->
    <article class="login_form">
        <?php
            if(!isset($_SESSION['id']))
            {
        ?>
        <form method="POST" action="./login_result.php">
            <input type="text" name="id" placeholder="아이디" required autofocus><br>
            <input type="password" name="pass" placeholder="비밀번호" required><br>
            <input type="checkbox" name="chkbox" value="yes">로그인 상태 유지<br>
            <input type="submit" value="로그인">
        </form>
        <?php
            }
            else
            {
        ?>
        <?=$_SESSION['id'] ?>님, 환영합니다. <br>
        <?php
            }
        ?>
    </article>
    <article class="join_form">
        <form action="./insertPro.php" name="member_form" method="post">
            <div id="reg-title"> ## 회원가입 ## </div>
            <table>
                <tr>
                    <td>* 아이디</td>
                    <td><input type="text" name="id" placeholder="아이디" required></td>
                    <td><a href="#"><input type="button" value="아이디 중복확인" onclick="check_id()"></a></td>
                    <td> 4~12자의 영문 소문자, 숫자와 특수기호(_)만 사용할 수 있습니다. </td>
                </tr>
                <tr>
                    <td>* 비밀번호</td>
                    <td><a href="#"><input type="password" name="pass" placeholder="패스워드 입력" required></a></td>
                </tr>
                <tr>
                    <td>* 비밀번호 확인</td>
                    <td><a href="#"><input type="password" name="pass_confirm" placeholder="패스워드 입력 확인" required></a></td>
                </tr>
                <tr>
                    <td>* 이름</td>
                    <td><a href="#"><input type="text" name="name" placeholder="이름" required></a></td>
                </tr>
                <tr>
                    <td>* 닉네임</td>
                    <td><a href="#"><input type="text" name="nick" placeholder="닉네임" required></a></td>
                    <td><a href="#"><input type="button" value="닉네임 중복확인"  onclick="check_nick()"></a></button></td>
                </tr>
                <tr>
                    <td>* 휴대폰</td>
                    <td><a href="#"><input type="text" class="hp" name="hp1" value="010" required></a>-</td>
                    <td><a href="#"><input type="text" class="hp" name="hp2" required></a>-</td>
                    <td><a href="#"><input type="text" class="hp" name="hp3" required></a></td>
                </tr>
                <tr>
                    <td>  이메일</td>
                    <td><a href="#"><input type="text" name="email1" id="email1" >@</a></td>
                    <td><a href="#"><input type="text" name="email2"></a></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="가입하기" onclick="check_input()">
                        <input type="reset" value="초기화하기" onclick="reset_form()">
                    </td>
                </tr>
            </table>
        </form>
    </article>
    <article class="logout_form">
    </article>
    <article class="update_form">
    </article>
<!-- footer -->
    
<script src="js/common.js"></script>
</body>
</html>