<!-- 会員登録画面 -->
    <!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>会員登録</title>
    </head>

    <style>
        /* エラーメッセージの色を設定 */
        .error_msg{
            font: #FF0000;
        }
    </style>

    <body>
        <main>
            <h2>会員登録</h2>
            <p>次のフォームに必要事項をご入力ください</p>

            <!-- 未入力項目がある場合、error_msgの中身を表示する -->
            <?php if(!empty($error_msg)): ?>
                <ul class="error_msg">
                    <?php foreach($error_msg as $value): ?>
                        <li><?php echo $value; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form action="check.php" method="post" enctype="multipart/form-data">
                ニックネーム<input type="text" name="name"><br>
                メールアドレス<input type="email" name="email"><br>
                パスワード<input type="password" name="password"><br>
                写真など<br>
                <input type="file" name="picture"><br>
                <input type="submit" name="check_btn" value="入力内容を確認する">
            </form>
        </main>
    </body>


</html>