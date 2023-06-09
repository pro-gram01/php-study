<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>カテゴリ登録</title>
    </head>

    <style>
        /* テキストボックスの背景色を設定 */
        .textbox{
            background: #D7EEFF;
        }
    </style>

    <?php require('dbconnect.php'); ?>

    <body>
        <main>
            <h2>カテゴリ登録</h2>
            <form action="input_do.php" method="post">
                <table border="1">
                    <tr>
                        <th>カテゴリ名</th>
                        <td><input type="text" name="category_name" class="textbox"></td>
                    </tr>
                </table>
                <!-- <button type="submit">登録</button> -->
                <input type="submit" value="登録">
            </form>
        </main>
    </body>
</html>