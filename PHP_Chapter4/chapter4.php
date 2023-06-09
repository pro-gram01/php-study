<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8">
        <title>chapter4</title>
        <!-- <link rel="stylesheet" href="stylesheet.css">         -->
    </head>

    <body>
        <?php
            // 書式
            $date = sprintf('%0d年 %0d月 %02d日',2022,1,11);
            print($date);

            print("<br>");

            // ファイルの読み書き
            $success = file_put_contents('./news_data/news.txt','2022-01-11 ホームページをリニューアルしました');
            if($success) {
                print('ファイルへの書き込みが完了しました。');
            } else {
                print('書き込みに失敗しました。フォルダの権限などを確認してください。');
            }

            print("<br>");

            $news = file_get_contents('./news_data/news.txt');
            print($news);

            print("<br>");
            print("XML読み込み");

            // XMLの読み込み
            $xmlTree = simplexml_load_file('aaa.xml');
            foreach($xmlTree->channel->item as $item) :?>
                <?php print("<br>"); ?>
                ・<a href="<?php print($item->link); ?>"><?php print($item->title); ?></a>
            <?php endforeach; ?>

            <?php print("<br>"); ?>
            <?php print("JSON読み込み"); ?>
            
            <?php
            // JSONの読み込み
            $file = file_get_contents('aaa.json');
            $json = json_decode($file);

            foreach($json->items as $item) :?>
                <?php print("<br>"); ?>
                ・<a href="<?php print($item->url); ?>"><?php print($item->title); ?></a>
            <?php endforeach; ?>

            <?php
            // JSON作成
            $json_sample = [
                'title' => 'JSONサンプル',
                'items' => [
                        'item01' => '1つ目',
                        'item02' => '2つ目',
                    ]
            ];

            $file = json_encode($json_sample,JSON_UNESCAPED_UNICODE);
            file_put_contents('json_sample.json',$file);

            ?>

    </body>