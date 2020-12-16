<?php
    $a = 7;
    $b = 8;

    $a++;   // 8
    $b--;   // 7

    $c = $a * $b + 2;   // 58
    $d = --$a + --$b;   // 7 + 6
    print "a: $a, b: $b, c:$c, d:$d <br>";
    
    $c = $a % $b;
    $b = $a + 2;
    $a = $a + 3;
    print "a: $a, b: $b, c:$c, d:$d <br>";    
?>