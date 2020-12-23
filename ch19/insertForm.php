<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>퀴즈 문제 출제 페이지</title>
</head>
<body>
    <form method="post" action="insertPro.php">
        <table border="1">
            <tr>
                <td>문제</td>
                <td><input type="text" name="question" size="100" placeholder="컴퓨터 범죄에 대한 대비책으로 옳지 않은 것은?" required onfocus></td>
                <!-- <td><textarea name="question" cols=50 rows=2 placeholder="컴퓨터 범죄에 대한 대비책으로 옳지 않은 것은?" required onfocus></textarea></td> -->
            </tr>
            <tr>
                <td>보기</td>
                 <td>내용</td>
            </tr>
            <tr>
                <td>1</td>
                <td><input type="text" name="ex1" size="100" placeholder="컴퓨터 바이러스 예방 및 치료에 대한 프로그램을 지속적으로 개발한다." required></td>
            </tr>
            <tr>
                <td>2</td>
                <td><input type="text" name="ex2" size="100" placeholder="크랙커(cracker)를 지속적으로 양성한다." required></td>
            </tr>
            <tr>
                <td>3</td>
                <td><input type="text" name="ex3" size="100" placeholder="인터넷을 통한 해킹으로부터 보호하기 위해 방화벽과 해킹 방지 시스템을 설치한다. " required></td>
            </tr>
            <tr>
                <td>4</td>
                <td><input type="text" name="ex4" size="100" placeholder="정기적인 보안 검사를 통해 해킹 여부를 감시하도록 한다. " required></td>
            </tr>
            <tr>
                <td>정답</td>
                <td><input type="text" name="dap" size="20" placeholder="2"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="출제하기">
                    <input type="reset" value="다시작성">
                </td>
            </tr>
        </table>
    </form>            
</body>
</html>