<?php
    $x = 75;
    $y = 25;
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
    echo $GLOBALS['z'];
    echo "<br>";

    echo $_SERVER['PHP_SELF'];
    echo "<br>";
    echo $_SERVER['SERVER_NAME'];
    echo "<br>";
    echo $_SERVER['HTTP_HOST'];
    echo "<br>";
    // echo $_SERVER['HTTP_REFERER'];
    // echo "<br>";
    // echo $_SERVER['HTTP_USER_AGENT'];
    // echo "<br>";
    // echo $_SERVER['SCRIPT_NAME'];

    echo $_REQUEST;
    echo $_POST;
    echo $_GET;
    echo $_FILES;
    echo $_ENV;
    echo $_COOKIE;
    echo $_SESSION;
?>