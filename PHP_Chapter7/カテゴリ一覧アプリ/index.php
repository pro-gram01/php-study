<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>トップページ</title>
    </head>
    <body>
        <h1>カテゴリー覧</h1>

        <?php 
        // dbconnect.phpを取り込む
        require('dbconnect.php'); 

        // MySQLに接続する
        // try {
        //     $db = new PDO('mysql:dbname=mydb;host=127.0.0.1;charset=utf8','root','');
        // } catch(PDOException $e) {
        //     echo 'DB接続エラー:' . $e->getMessage();
        // }  

        // <!-- categoryテーブルを作成する  -->
        echo "<table border=1>";        
        echo "<tr>";
        echo "<th>コード</th>";
        echo "<th>カテゴリ名</th>";
        echo "<th>更新</th>";
        echo "<th>削除</th>";
        echo "</tr>";

        // categoryテーブルからidとnameを取得する
        $records = $db->query('SELECT * FROM category');
        while($record = $records->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>".$record['category_id'] ."</td>";
            echo "<td>".$record['category_name'] ."</td>";
            // レコード1件ごとに更新ボタンを追加(ボタン押すと遷移)
            echo "<form action=update.php method=post>";
            echo "<input type=hidden name=category_id value=" .$record["category_id"] . ">";
            echo "<input type=hidden name=category_name value=" .$record["category_name"] . ">";
            echo "<td><input type=submit value=更新></td>";
            echo "</form>";
            // レコード1件ごとに削除ボタンを追加(ボタン押すと遷移)
            echo "<form action=delete_do.php method=post>";
            echo "<input type=hidden name=category_id value=" .$record["category_id"] . ">";
            echo "<td><input type=submit value=削除></td>";
            echo "</form>";       
            echo "</tr>";
        }
        
        echo "</table>";

        ?>

        <a href="input.php">新規登録</a>
      
    </body>
</html>