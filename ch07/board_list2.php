<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 목록</title>
</head>
<body>
    <h2>게시판 목록 보기</h2>
    <table border="1" width=600>
        <tr bgcolor="yellow" align="center">
            <td>번호</td><td>제목</td><td>글쓴이</td><td>날짜</td>
        </tr>
        <?php
            for($i = 1; $i <= 10; $i++)
            {
                $num = $i;
                $title = "게시판 제목".$i;
                $name = "홍길동".$i;
                $date = date("Y-m-d H:i:s", time());
                //<tr>
                //<td>번호</td><td>제목</td><td>글쓴이</td><td>날짜</td>
                //</tr>
                print("<tr align=center>");
                print("<td>".$num."</td><td>".$title."</td><td>".$name."</td><td>$date</td>");
                print("<tr>");
            }
        ?>
    </table>
</body>
</html>