<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8">
        <title>chapter2</title>
        <!-- <link rel="stylesheet" href="stylesheet.css">         -->
    </head>

    <body>
        <!-- 練習問題2-1 -->
        <p><?php echo('みきつばさ'); ?></p>
        <p><?php echo('PHPを勉強中です!'); ?></p>
        <a href="<?php print('http://h2o-space.com'); ?>">PHP(リンク)を埋め込みました</a>
        <p><?php print("I'm studing"); ?></p>
        <p><?php print('I\'m studing"PHP"'); ?></p>
        <br>
        <p><?php print((123+2)*5/3); ?></p>
        <!-- 練習問題2-2-->
        <p><?php print(60*60*24); ?></p>
        <!-- 練習問題2-3 -->
        <p><?php print('今日は'.date('Y年m年d日').'です'); ?></p>
        <!-- 練習問題2-4 -->
        <?php
        $sum = 8+2;
        print($sum);
        ?>
    </body>