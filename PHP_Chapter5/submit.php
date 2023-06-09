<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>submit5</title>
    </head>
    <body>
        お名前：<?php print(htmlspecialchars($_POST['my_name'], ENT_QUOTES)); ?>
        <br>
        性別：<?php print(htmlspecialchars($_POST['gender'], ENT_QUOTES)); ?>
        <br>
        ご予約希望日:
        <?php
        foreach ($_POST['reserve'] as $reserve) {
            print(htmlspecialchars($reserve, ENT_QUOTES) . ' ');
        }

        print("<br>");

        $age = 25;
        $age = mb_convert_kana($age, 'n', 'UTF-8');
        // $ageが文字型か数値か確認
        if(is_numeric($age)) {
            print('年齢：'. $age . '歳');
        } else {
            print('※ 年齢が数字ではありません');
        }

        print("<br>");

        $zip = '9876543';
        $zip = mb_convert_kana($zip, 'a', 'UTF-8');
        // 正規表現チェック
        if(preg_match("/\A\d{3}[-]\d{4}\z/", $zip)){
            print('郵便番号： 〒' . $zip);
        }else{
            print('※ 郵便番号を 123-4567 の形式でご記入ください');
        }
        ?>

        <!-- headerファンクション -->
        <p>H2O Space. のサイトに移動します</p>
        <?php
        // 指定したページにリダイレクトする
        // header('Location: https://h2o-space.com');
        // exit();
        ?>

        <!-- 剰余算 23年1月の曜日を繰り返し表示する。-->
        <?php
        $week = ['土','日','月','火','水','木','金'];
        for($i=1; $i<=31; $i++){
            print($i.'日('.$week[$i%7].')<br/>');
            // 1%7=1 → 1=7*0+1
            // $iが1～6の時はその値が余りとなる。
        }
        print(2%7);
        ?>
    </body>
</html>