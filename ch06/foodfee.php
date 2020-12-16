<?php
    // 초등학생 급식비
    // 1학년 3만원 학년 증가 시 5000원씩 추가
    // $grade = 3;
    // result = 40000원
    $grade = $_REQUEST["grade"];
    $fee = ($grade - 1)*5000 + 30000;

    switch($grade)
    {
        case 1: 
            print "$grade 학년 급식비: $fee 원";
        break;
        case 2: 
            print "$grade 학년 급식비: $fee 원";
        break;
        case 3: 
            print "$grade 학년 급식비: $fee 원";
        break;
        case 4: 
            print "$grade 학년 급식비: $fee 원";
        break;
        case 5: 
            print "$grade 학년 급식비: $fee 원";
        break;
        case 6: 
            print "$grade 학년 급식비: $fee 원";
        break;
    }
?>