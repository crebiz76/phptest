<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>구구단 테이블</title>
</head>
<body>
    <table border="1" width="800">
        <tr bgcolor="yellow" align="center">
            <td>2단</td><td>3단</td><td>4단</td><td>5단</td>
            <td>6단</td><td>7단</td><td>8단</td><td>9단</td>
        </tr>
        <?php
            for($num = 1; $num <=9; $num++)
            {
                print("<tr align=\"center\">");
                for($dan = 2; $dan <= 9;$dan++)
                {
                    $res = $dan * $num;
                    print("<td> $dan x $num = $res </td>");
                }
                print("</tr>");
            }
        ?>
    </table>
</body>
</html>