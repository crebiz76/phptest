<?php
    session_start();
?>

<meta charset="utf-8">
<?php
    if(!isset($_SESSION['id']))
    {
?>
    <script>
        alert('로그인 후 이용해 주세요.');
        history.back();
    </script>
<?php
    }

    if(isset($_REQUEST['mode']))
        $mode = $_REQUEST['mode'];
    else
        $mode = "";
    
    if(isset($_REQUEST['num']))
        $num = $_REQUEST['num'];
    else
        $num = "";

    if(isset($_REQUEST['html_ok']))
    {
        $html_ok = $_REQUEST['html_ok'];
    }
    else
        $html_ok = "";

    $subject = $_REQUEST['subject'];
    $content = $_REQUEST['content'];

    require_once('MyDB.php');
    $pdo = db_connect();

    if($mode == "modify"){
        try{
            $pdo -> beginTransaction();
            $sql = "update greet set subject=?, content=?, is_html=? where num=?";
            $stmh = $pdo -> prepare($sql);
            $stmh -> bindValue(1, $subject, PDO::PARAM_STR);
            $stmh -> bindValue(2, $content, PDO::PARAM_STR);
            $stmh -> bindValue(3, $html_ok, PDO::PARAM_STR);
            $stmh -> bindValue(4, $num,     PDO::PARAM_STR);
            $stmh -> execute();
            $pdo -> commit();

            header("Location: http://localhost/source/ch24/listGreet.php");
        }
        catch (PDOException $Exception){
            $pdo -> rollBack();
            print "오류: ".$Exception -> getMessage();
        }
    }
    else{
        if($html_ok == "y"){
            $is_html = "y";
        }
        else{
            $is_html = "";
            $content = htmlspecialchars($content);
        }

        try{
            $pdo -> beginTransaction();
            $sql = "insert into greet(id, name, nick, subject, content, regist_day, hit, is_html) ";
            $sql.= "values(?, ?, ?, ?, ?, now(), 0, ?)";
            $stmh = $pdo -> prepare($sql);
            $stmh -> bindValue(1, $_SESSION['id'],  PDO::PARAM_STR);
            $stmh -> bindValue(2, $_SESSION['name'],PDO::PARAM_STR);
            $stmh -> bindValue(3, $_SESSION['nick'],PDO::PARAM_STR);
            $stmh -> bindValue(4, $subject,         PDO::PARAM_STR);
            $stmh -> bindValue(5, $content,         PDO::PARAM_STR);
            $stmh -> bindValue(6, $is_html,         PDO::PARAM_STR);
            $stmh -> execute();
            $pdo -> commit();

            header("Location: http://localhost/source/ch24/listGreet.php");
        }
        catch (PDOException $Exception){
            $pdo -> rollBack();
            print "오류: ".$Exception -> getMessage();
        }
    }
?>


    
