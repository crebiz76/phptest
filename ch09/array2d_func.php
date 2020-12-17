<?php
    // 2차원 배열의 이용하여 세 학생이 받은 5과목 점수의 합계와 평균 계산
    $score = array(
        array(88, 98, 96, 77, 63), 
        array(89, 77, 66, 86, 93), 
        array(74, 83, 95, 86, 97)
    );

    // 학생별
    $sum = array(0,0,0);

    for($i = 0; $i < 3; $i++)
    {
        // $student = $i + 1;
        // 과목별
        for($j = 0; $j < 5; $j++)
        {
            // $subject = $j + 1;
            // print($student."번 학생의 ");
            print(($i + 1)."번 학생의 ");
            print("과목".($j + 1)."의 점수는 ".$score[$i][$j]."입니다. <br>");
            
            // 합계
            $sum[$i] += $score[$i][$j];
        }
        print("<br>");
        $avg[$i] = $sum[$i] / 5;
    }
    // print("<br>");

    // 각 학생의 합계와 평균
    for($k = 0; $k < 3; $k++)
    {
        print(($k+1)."번 학생의 총점은 ".$sum[$k]."이고, 평균은 ".$avg[$k]."입니다. <br>");
    }
?>