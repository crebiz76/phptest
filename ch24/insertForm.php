<?php
    // session_start();
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
                    <td><a href="#"><input type="button" value="닉네임 중복확인"  onclick="check_nick()"></a></input></td>
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
    <article class="memo_form">
    </article>
<!-- footer -->
    
<script src="js/common.js"></script>
</body>
</html>