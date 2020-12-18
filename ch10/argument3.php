<?php
    function argument($a, $b, $c)
    {
        $d = $a + $b - $c;
        return $d;
    }

    $res = argument(500, 200, 300);
    print $res;
?>