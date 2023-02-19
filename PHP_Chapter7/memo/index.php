<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>トップページ</title>
    </head>
    <body>
        MySQLに接続します
        <pre>
        <?php 
        // MySQLに接続する
        try {
            $db = new PDO('mysql:dbname=mydb;host=127.0.0.1;charset=utf8','root','');
        } catch(PDOException $e) {
            echo 'DB接続エラー:' . $e->getMessage();
        }
        // SQLを実行(成功した場合、メッセージを表示する)
        $count = $db->exec('INSERT INTO my_items SET maker_id=1, item_name="もも",
        price=210, keyword="缶詰,ピンク,甘い", sales=0, created="2018-01-23",
        modified="2018-01-23"');
        echo $count . '件のデータを挿入しました<br>';

        // 各レコードを抽出し、商品名を表示する
        $records = $db->query('SELECT * FROM my_items');
        while($record = $records->fetch()) {
            print($record['item_name'] . "\n");
        }
        
        // メモ一覧を表示させる(idの降順)新しいものが一番上
        $memos = $db->query('SELECT * FROM memos ORDER BY id DESC');
        ?>
        <article>
        <?php while($memo = $memos->fetch()): ?>
            <p><a href="#"><?php print($memo['memo']); ?></a></p>
            <time><?php print($memo['create_at']); ?></time>
            <hr>
        <?php endwhile; ?>
        </article>


        </pre>
    </body>
</html>