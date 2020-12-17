<?php
    // 학생들의 점수의 합계와 평균 구하기
    $eng_score = array(87, 76, 98, 87, 87, 93, 79, 85, 88, 63, 74, 84, 93, 89, 63, 99, 81, 70, 80, 95);
    print "학생 20명의 영어 점수: ";
    for($i = 0; $i < 20; $i++)
    {
        $sum += $eng_score[$i];
        print $eng_score[$i]." ";
    }
    $avg = $sum/20;
    print("<br>");

    print("합계: $sum, 평균: $avg");
?>