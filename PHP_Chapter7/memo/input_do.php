<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>input_do</title>
    </head>
    <body>
        <main>
            <h2>Practice</h2>
            <pre>
                <?php
                // DB接続
                try {
                    $db = new PDO('mysql:dbname=mydb;host=127.0.0.1;charset=utf8', 'root', '');    
                } catch (PDOException $e) {
                    echo 'DB接続エラー: ' . $e->getMessage();
                }

                // フォームの値を保存(memo)
                $statement = $db->prepare('INSERT INTO memos SET memo=?,create_at=NOW()');
                // $statement -> execute(array($_POST['memo']));
                $statement -> bindParam(1,$_POST['memo']);
                $statement -> execute();
                echo 'メモが登録されました';
                ?>
            </pre>
        </main>
    </body>
</html>