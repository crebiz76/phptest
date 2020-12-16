<!-- 
해당 부분 인식 못함: 에러발생
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>구구단</title>
</head>       
-->

<?php
    $dan = 2;
    print "
        <html>
        <body>
            <h3>2단 구구단 표 만들기</h3>
            <table border='1' width='100'>";
    $num = 1;
    while($num <= 9)
    {
        $result = $dan * $num;
        print "<tr><td align='center'>$dan x $num = $result</td></tr>";
        $num++;
    }
    print "
        </table>
        </body>
        </html>";
?>