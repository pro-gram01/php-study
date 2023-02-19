<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>占い履歴</title>
    </head>
    <body>
        <h1>占い結果履歴</h1>   
        <?php          
        // 最新の占い結果を保存(各項目)
        // echo ($_SESSION['save_month'](0));
        $months = $_SESSION["save_month"];
        
        foreach($months as $value) {
            echo $value;
        }
        // echo ($_SESSION['save_month']);
        echo ($_SESSION['save_color'] ."<br>");
        echo ($_SESSION['save_item'] ."<br>");
        echo ($_SESSION['save_rank']);
        ?>

        <hr>
        <!-- -------- 以降履歴として残し表示する(リストにする) --------- -->
        <?php
        print_r ($_SESSION['save_month']);
        print_r ("ラッキーカラー：".$_SESSION['save_color'] ."<br>");
        print_r ("ラッキーアイテム：".$_SESSION['save_item'] ."<br>");
        print_r ($_SESSION['save_rank']);

        session_unset();

        ?>
        
        <p><a href="index.html">戻る</a></p>
    </body>
</html>