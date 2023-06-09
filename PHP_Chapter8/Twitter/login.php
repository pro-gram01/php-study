<!-- ログイン画面 -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログイン画面</title>
    </head>

    <style>
        /* テキストボックスの背景色を設定 */
        /* .textbox{
            background: #D7EEFF;
        } */
    </style>

    <body>
        <main>
            <h2>ログインする</h2>
            メールアドレスとパスワードを記入してください<br>
            入会手続きが未だの方はこちらからどうぞ<br>
            <a href="register.php">入会手続きをする</a><br><br>

            <form action="register.php" method="post">
                メールアドレス<input type="email" name="email" class="textbox"><br>
                パスワード<input type="password" name="password" class="textbox"><br>
                ログイン情報の記録<br>
                <input type="checkbox" name="cookie">次回からは自動的にログインする<br>
                <input type="submit" value="ログインする">
            </form>
        </main>
    </body>

</html>