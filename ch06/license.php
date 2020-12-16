<?php
    $pilgi = 65;
    $silgi = 90;
    $result = "불합격";

    if($pilgi >= 70 && $silgi >= 80)
    {
        $result = "합격";
    }

    print "필기점수: $pilgi, 실기 점수: $silgi <br>";
    print "결과: $result <br>";
?>
