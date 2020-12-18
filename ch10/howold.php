<?php
    // 만 나이 계산하기
    function ageCal($today, $birthday)
    {
        print("=== Age Calculator ===<br>");
        $day1 = explode("-", $today);
        $day2 = explode("-", $birthday);

        print("This Year: $day1[0], This Month: $day1[1], This day: $day1[2] <br>");
        print("Birth Year: $day2[0], Birth Month: $day2[1], Birth day: $day2[2] <br>");

        $result = 0;
        $year = $day1[0] - $day2[0];
        $month = $day1[1] - $day2[1];
        $day = $day1[2] - $day2[2];

        if(($year <= 0) && ($month <= 0) && ($day <= 0))
        {
            print("You are not born<br>");
            print("The D-day is $year year(s), $month month(s), $day day(s)<br>");
            $result = -1;
        }
        else
        {
            if($day < 0)
            {
                $month -= 1;
                $day += 30;
            }
            if($month < 0)
            {
                $year -= 1;
                $month += 12;
            }
            $result = $year;

            // Case - 1
            // if($month < 0)
            // {
            //     $result = $year - 1;
            // }
            // else if($month == 0)
            // {
            //     if($day > 0)
            //     {
            //         $result = $year;
            //     }
            //     else
            //     {
            //         $result = $year - 1;
            //     }
            // }
            // else
            // {
            //     $result = $year;
            // }
            print("You lived for $year year(s) - $month month(s) - $day day(s)<br>");            
        }
        return $result;
    }

    $today = date("Y-m-d");
    print("$today <br>");

    $temp = array($_REQUEST['year'], $_REQUEST['month'], $_REQUEST['day']);
    // $birthday = "2019-02-16";
    $birthday = $temp[0]."-".$temp[1]."-".$temp[2];
    print("$birthday <br>");

    $age = ageCal($today, $birthday);
    if($age >= 0) print("You are $age year(s) old<br>");
?>
