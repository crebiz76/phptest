<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입 양식</title>
</head>
<body>
    <form method="post" action="insertPro.php">
        <table border="1">
            <tr>
                <td>이메일</td>
                <td><input type="text" name="id" size="20" placeholder="test@samle.com" required onfocus></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                 <td><input type="password" name="passwd" size="20" placeholder="6~16글자" required></td>
            </tr>
            <tr>
                <td>이름</td>
                <td><input type="text" name="name" size="20" placeholder="홍길동" required></td>
            </tr>
            <tr>
                <td>전화번호</td>
                <td><input type="text" name="tel" size="20" placeholder="010-1234-5678"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="가입하기">
                    <input type="reset" value="재작성">
                </td>
            </tr>
        </table>
    </form>            
</body>
</html>