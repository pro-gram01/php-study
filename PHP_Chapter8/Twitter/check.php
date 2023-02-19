<?php

    try {
        // 例外処理
        // ニックネームorメールアドレスorパスワードが未入力の場合→register.phpにリダイレクトさせる
        // if($_POST['name'] || $_POST['email'] || $_POST['password'] == ''){
        //     throw new Exception();
        } catch (Exception $e) {
            // register.phpにリダイレクト
            header('Location:register.php');
            exit;
            echo "エラー：必須項目に未入力ものがあります<br>";
        }

        // こちらで未入力欄のチェック(メッセージここからも返す?)
    
        // 未入力欄のチェック
        // if(!empty($_POST) && empty($_SESSION['input_data'])){
            // エラーメッセージを配列で保持する
            $error_msg = array();
            // 入力項目の例外処理(チェックで問題なければcheck.phpでリダイレクト?)
            // ニックネーム
            if(empty($_POST['name'])){
                $error_msg[] = "ニックネームを入力してください";
            }
            // メールアドレス
            if(empty($_POST['email'])){
                $error_msg[] = "メッセージを入力してください";
            }
            // パスワード
            if(empty($_POST['password'])){
                $error_msg[] = "パスワードを入力してください";
            }
            // エラーがあった場合、$error_msg[]を持ってregister.phpにリダイレクトしたい
            if(!empty($error_msg)){

                // 未入力項目がある場合、error_msgの中身を表示する
                if(!empty($error_msg)){
                    foreach($error_msg as $value){                  
                        echo "<ul>"."<li>".$value."</li>"."</ul>";
                    }
                }
                
                // 登録ボタンを使用不可にする
                // echo "<input type=submit value=登録する disabled>";

                // header('Location:register.php');
                // $_SESSION['input_data'] = $_POST;
                // header('Location:./check.php');
                // exit();
            }

    // dbconnect.phpを取り込む
    require('dbconnect.php');

    // フォームからPOSTされた情報を変数に格納
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $file_name = $_FILES['picture'];
    $show_file_name = $file_name['name'];
    // echo $show_file_name;
?>

<!-- 入力内容確認画面 -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>入力内容確認</title>
    </head>

    <style>
        /* エラーメッセージの文字色を赤に設定 */
        li{
            color: red;
        }
    </style>

    <body>
        <?php
            // ファイル名を取得
            $file = $_FILES['picture'];
            // ファイルの絶対パスの取得(元々の保存場所)
            $tmp_file = $file['tmp_name'];
            // 画像の一時保存先を設定
            $filePath = './user_img/' . $file['name'];
             // 元々の保存先から一時保存先へファイルを移動
            $success = move_uploaded_file($file['tmp_name'], $filePath);
            // ファイルパスをセッションに保存
            $_SESSION['filePath'] = $filePath;
        ?>


        <main>
            <h2>会員登録</h2>
            <p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
            <form action="thanks.php" method="post">
                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="password" value="<?php echo $password; ?>">
                <input type="hidden" name="picture" value="<?php echo $show_file_name; ?>">

                ニックネーム<br>
                <?php echo $name; ?><br>
                メールアドレス<br>
                <?php echo $email; ?><br>
                パスワード<br>
                <?php echo "【表示されません】" ; ?><br>
                写真など<br>
                <img src="<?php echo $filePath; ?>"><br>

                <input type="button" value="<< 書き直す" onclick="history.back(-1)">
                <!-- <a href="register.php"><< 書き直す</a> -->
                <input type="submit" value="登録する">
            </form>
        </main>
    </body>

</html>
