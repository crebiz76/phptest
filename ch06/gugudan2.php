<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>2단 구구단 표 만들기</h3>
    <table border='1' width='100'>
        <tr><td align='center'>2 x 1 = 2</td></tr>
        <tr><td align='center'>2 x 2 = 4</td></tr>
        <tr><td align='center'>2 x 3 = 6</td></tr>
        <tr><td align='center'>2 x 4 = 8</td></tr>
        <tr><td align='center'>2 x 5 = 10</td></tr>
        <tr><td align='center'>2 x 6 = 12</td></tr>
        <tr><td align='center'>2 x 7 = 14</td></tr>
        <tr><td align='center'>2 x 8 = 16</td></tr>
        <tr><td align='center'>2 x 9 = 18</td></tr>
    </table>
    
    <?php
        print "<h3>2단 구구단 표 따라 만들기</h3>";
        print "<table border='1' width='100'>";
        $dan = 2;
        $num = 1;
        while($num <= 9)
        {
            $res = $dan * $num;
            print "<tr><td align='center'>$dan x $num = $res</td></tr>";
            $num++;
        }
        print "</table>";
    ?>
</body>
</html>