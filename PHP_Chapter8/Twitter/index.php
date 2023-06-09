<!-- 投稿画面 -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>投稿画面</title>
    </head>

    <style>
    </style>

    <?php
        try{
            // dbconnect.phpを取り込む
            require('dbconnect.php');

        }catch(Exception $e) {
            echo 'エラー:' . $e->getMessage();
        }
    ?>

    <body>
        <main>
            <h2>ひとこと掲示板</h2>
            <?php echo $_SESSION['name'] . "さん、メッセージをどうぞ" ;?>
            <form action="#" method="post">
                <textarea rows="10" cols="60" name="reply_msg"></textarea><br><br>
                <!-- 投稿するを押したらセッションをセットする -->
                <input type="submit" name="post_session" value="投稿する"><br>
                <a href="login.php">ログアウト</a>
            </form>
        </main>

        <?php
            // $session_id = session_id();
            // echo $session_id."<br>";
            // header("Location:./index.php");
            // $_POST['post_session'] = "";
            // $_SESSION['reply_msg'] = $_POST['reply_msg'];
            // セッションがあるか判定する
            if(empty($_POST['post_session'])){
                // echo "投稿ボタンは押されていません<br><br>";
                // セッションがない場合は、データを追加せず返信フォームの描画のみする
                $posts = $db->query('SELECT nickname, picture, reply_msg, posts.created
                FRbindParamOM members INNER JOIN posts ON members.id = posts.member_id 
                ORDER BY posts.id DESC');
    
                // 投稿者名、画像、投稿メッセージ、日付時間、返信用リンクを表示させる -->
                // while($post = $posts->fetch()){
                //     echo($post['picture'])."<br>";
                //     echo($post['reply_msg'])."(".($post['nickname']).")"."<a href= # >{Re}</a>"."<br>";
                //     echo($post['created'])."<br>";           
                //     echo "<hr>";
                // }
            } else {
                // echo "投稿ボタンが押されました<br><br>";
                // member_idとreply_post_idは仮で1を代入
                $_SESSION['member_id'] = 1;
                $_SESSION['reply_post_id'] = 1;

                // セッションがある場合、postsテーブルにデータを保存する
                $sql = 'INSERT INTO posts (reply_msg, member_id, reply_post_id, created)
                values (?, ?, ?, NOW())';

                $statement = $db->prepare($sql);
                // $statement -> execute(array($_POST['category_name""']));
                $statement -> bindParam(1,$_POST['reply_msg']);
                $statement -> bindParam(2,$_SESSION['member_id']);
                $statement -> bindParam(3,$_SESSION['reply_post_id']);
                $statement -> execute();

                // ------------ 返信用フォーム(テキストエリアの下) -------------
                // メモ一覧を表示させる(idの降順)新しく追加したデータが一番上にくるように
                // 2つのテーブルを結合する
                $posts = $db->query('SELECT nickname, picture, reply_msg, posts.created
                FROM members INNER JOIN posts ON members.id = posts.member_id 
                ORDER BY posts.id DESC');


                // 投稿者名、画像、投稿メッセージ、日付時間、返信用リンクを表示させる -->
                while($post = $posts->fetch()){
                    // echo($post['picture'])."<br>"; ?>
                    <img src= <?php echo $_SESSION['filePath']; ?>>
                    <?php echo($post['reply_msg'])."(".($post['nickname']).")".
                    "<a href= # >{Re}</a>"."<br>";
                    echo($post['created'])."<br>";           
                    echo "<hr>";
                }

      
            }
        ?>
                <!-- {Re}リンクの処理 -->
                <!-- <form action="#" name="" method="post">
                    <input type="hidden" name="reply" value="<?php echo "@" .$_POST['nickname']; ?>"><br>
                    <?php echo "@" .$_POST['nickname']; ?><br>
                    <a href="javascript: thanks_form.submit()">{Re}</a><br>  
                </form> -->

            <!-- 投稿ボタンセッションの削除
            $_POST['post_session'] = ""

            現在のセッションに関連づけられた全てのデータを破棄
            session_destroy();  -->     
    </body>

</html>