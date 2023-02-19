<!-- 登録完了画面 -->
<?php

    try{
        // dbconnect.phpを取り込む
        require('dbconnect.php');

        echo "以下のデータを追加します<br>";
        echo "ニックネーム:" .$_POST['name'] ."<br>";
        echo "メールアドレス:" .$_POST['email'] ."<br>";
        echo "パスワード:" .$_POST['password'] ."<br>";
        echo "写真：" .$_POST['picture'] ."<br>";

        // $name = $_POST['name'];

        // 会員登録された情報をmembersテーブルに保存
        // INSERT文に直で値を代入、エラーが出ない原因
        // $statement = $db->prepare('INSERT INTO members SET nickname=$_POST['name'], email=?, pass=?, picture=?, created=NOW(), modified=time()');
        $sql = 'INSERT INTO members (nickname, email, pass, picture, created)
        values (?, ?, ?, ?, NOW())';

        $statement = $db->prepare($sql);
        // $statement -> execute(array($_POST['category_name""']));
        $statement -> bindParam(1,$_POST['name']);
        $statement -> bindParam(2,$_POST['email']);
        $statement -> bindParam(3,$_POST['password']);
        $statement -> bindParam(4,$_POST['picture']);
        $statement -> execute();

        // 最新のレコードのmembersのidを取得したい
        // $member_id = $db->query('SELECT id FROM members WHERE ');
        // $member_id = $db->query('SELECT id FROM members order by id desc limit1');
        // echo $member_id;
        // // 投稿者名、画像、投稿メッセージ、日付時間、返信用リンクを表示させる -->
        //     while($post = $posts->fetch()){
        //     echo($post['picture'])."<br>";        
        //     echo "<hr>";
        // }

        // 登録データをセッションに保存する
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['picture'] = $_POST['picture'];
        
    }catch(Exception $e) {
        echo 'エラー:' . $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>登録完了画面</title>
    </head>

    <style>
        /* テキストボックスの背景色を設定 */
        /* .textbox{
            background: #D7EEFF;
        } */
    </style>

    <body>
        <main>
            <h2>会員登録</h2>
            ユーザー登録が完了しました<br>
            <form action="index.php" name="thanks_form" method="post">
                <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>"><br>
                <a href="javascript: thanks_form.submit()">ログインする</a><br>  
                <a href="login.php">ログアウト</a>
            </form>
        </main>
    </body>

</html>