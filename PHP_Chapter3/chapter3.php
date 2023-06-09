<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8">
        <title>chapter3</title>
        <!-- <link rel="stylesheet" href="stylesheet.css">         -->
    </head>

    <body>
        <!-- 練習問題3-1 -->
        <!-- <?php
        // for($i = 100; $i >= 0; $i--){
            // if($i % 2 == 0){
                // print($i).'/';
            // }
        // } -->

        // print("\n");

        // 明日から365日後まで表示(for)
        // for($i = 1; $i <= 365; $i++){
        //     print(date('n/j(D)',strtotime('+'.$i.'day')));
        // }
        // ?>
        
        <!-- 練習問題3-2 (while) -->
        <!-- <?php $i = 1; ?>
        <?php while($i <= 365): ?>
            <?php print(date('n/j(D)',strtotime('+'.$i.'day'))); ?>
            <?php $i++; ?>
        <?php endwhile; ?> -->
        
        <!-- 配列 -->
        <?php
        // PHP5.4～の場合
        $week_name = ['日','月','火','水','木','金','土'];
        //PHP5.3以前の場合
        // $week_name = array('日','月','火','水','木','金','土');
        // print($week_name[1]);
        $week = 1 + 3;
        $date = date('w');
        // print($week_name[$week].'<br>');
        // 今日の曜日を取得する
        // print($week_name[$date].'曜日'.'<br>');     
        print('今日は'.$week_name[date('w')].'曜日です'.'<br>');
        ?>

        <!-- 練習問題3-3 -->
        <?php
        $age_list = ['10代以下','20代','30代','40代','50代','60代以上'];
        // リストからインデックスを指定する
        print('私は'.$age_list[1].'です'.'<br>');
        ?>
        
        <!-- 練習問題3-4 -->
        <?php
        $devices = [
            'win' => 'Windows',
            'mac' => 'Macintosh',
            'iphone' => 'iPhone',
            'ipad' => 'iPad',
            'android' => 'Android'
        ];
        ?>

        <?php foreach($devices as $device => $dv_name): ?>
            <?php print($device.':'.$dv_name."\n".'<br>'); ?>
        <?php endforeach; ?>

        <?php
        $x = 0;
        if(!$x){
            print('xは0');
        }  
        ?>

        <?php print('<br>'); ?>
        
        <!-- 練習問題3-4 -->
        <?php $answer = 0; ?>
        <?php if($answer == 0): ?>
            <?php print('1以上の数字を指定してください'); ?>
        <?php endif; ?>

    </body>