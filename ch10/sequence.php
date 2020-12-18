<?php
    function seq($start, $end)
    {
        $sum = 0;
        for($i = $start; $i <= $end; $i++)
        {
            $sum += $i;
        }
        return $sum;
    }
    
    $from = $_REQUEST["from"];
    $to = $_REQUEST["to"];
    
    $res = seq($from , $to);
    print "$from 에서 $to 까지의 합: $res <br>";
?>