<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css" type="text/css">
    <script>
        function check_id()
        {
            window.open("check_id.php?id="+document.member_form.id.value, "IDcheck",
            "left=200, top=200, width=400, height=200, scrollbars=no, resizable=yes");
        }
        
        function check_nick()
        {
            window.open("check_nick.php?nick="+document.member_form.nick.value, "NICKcheck",
            "left=200, top=200, width=400, height=200, scrollbars=no, resizable=yes");
        }

        function check_input()
        {
            // console.log("check_input");
            if(!document.member_form.hp2.value || !document.member_form.hp3.value)
            {
                alert("휴대폰 번호를 입력하세요.");
                document.member_form.nick.focus();
                return;
            }

            if(document.member_form.pass.value != document.member_form.pass_confirm.value)
            {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요.");
                document.member_form.pass.focus();
                document.member_form.pass.select();
                return;
            }

            document.member_form.submit();
        }

        function reset_form()
        {
            document.member_form.id.value = "";
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.nick.value = "";
            document.member_form.hp2.value = "";
            document.member_form.hp3.value = "";
            document.member_form.email1.value = "";
            document.member_form.email2.value = "";

            document.member_form.id.focus();
            return;
        }
    </script>
</head>
<body>
    <header>
        <a href="./index.php" id="logo"><h1>HOME</h1></a>
        <div id="top_login">
            <?php
                if(!isset($_SESSION['id']))
                {
            ?>
                    <a href="./login_form.php">로그인</a> | <a href="./insertForm.php">회원가입</a>
            <?php
                }
                else
                {
            ?>
                    <?=$_SESSION['id'] ?> (Level: <?=$_SESSION['level'] ?>) | 
                    <a href="./logout.php">로그아웃</a> | <a href="./updateForm.php">정보수정</a>
            <?php
                }
            ?>
        </div>
    </header>
    <article>
        <form action="./insertPro.php" name="member_form" method="post">
            <div id="reg-title"> ## 회원가입 ## </div>
            <table border=1>
                <tr>
                    <td>* 아이디</td>
                    <td><input type="text" name="id" placeholder="아이디" required></td>
                    <td><a href="#"><input type="button" value="아이디 중복확인" onclick="check_id()"></a></td>
                    <td> 4~12자의 영문 소문자, 숫자와 특수기호(_)만 사용할 수 있습니다. </td>
                </tr>
                <tr>
                    <td>* 비밀번호</td>
                    <td colspan=3><a href="#"><input type="password" name="pass" placeholder="패스워드 입력" required></a></td>
                </tr>
                <tr>
                    <td>* 비밀번호 확인</td>
                    <td colspan=3><a href="#"><input type="password" name="pass_confirm" placeholder="패스워드 입력 확인" required></a></td>
                </tr>
                <tr>
                    <td>* 이름</td>
                    <td colspan=3><a href="#"><input type="text" name="name" placeholder="이름" required></a></td>
                </tr>
                <tr>
                    <td>* 닉네임</td>
                    <td><a href="#"><input type="text" name="nick" placeholder="닉네임" required></a></td>
                    <td colspan=2><a href="#"><input type="button" value="닉네임 중복확인"  onclick="check_nick()"></a></button></td>
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
                    <td colspan=2><a href="#"><input type="text" name="email2"></a></td>
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
    
</body>
</html>
