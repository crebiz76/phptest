<!DOCTYPE html>
<?php
    $dan = $_REQUEST["dan"];
?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$dan?>단 구구단</title>
</head>
<body>
    <?php
        print "<h3>".$dan."단 구구단 표</h3>";
        print "<table border='1' width='100'>";
        $num = 1;
        /*
        while($num <= 9)
        {
            $res = $dan * $num;
            print "<tr><td align='center'>$dan x $num = $res</td></tr>";
            $num++;
        }
        */
        // while -> for
        for($num = 1; $num <= 9; $num++)
        {
            $res = $dan * $num;
            print "<tr><td align='center'>$dan x $num = $res</td></tr>";
        } 
        print "</table>";
    ?>
</body>
</html>