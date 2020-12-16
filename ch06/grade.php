<?php
    // $score = 83;
    $score = $_REQUEST["score"];

    if($score >= 90) $grade = "A등급";
    elseif($score >= 80) $grade = "B등급";
    elseif($score >= 70) $grade = "C등급";
    else $grade = "불합격";

    print "취득점수: $score, 등급: $grade<br>";
?>