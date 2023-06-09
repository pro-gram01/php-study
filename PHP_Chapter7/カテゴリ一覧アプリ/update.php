<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>カテゴリ更新</title>
    </head>

    <body>
        <h1>カテゴリ更新</h1>

        <?php
            // dbconnect.phpを取り込む
            require('dbconnect.php'); 

            // 更新するコードとカテゴリ名を取得する
            echo "<form action=update_do.php method=post>";
                echo "<table border=1>";
                echo "<tr>";
                // echo "<th>コード</th>"."<td>".$_POST['category_id']."</td>";
                echo "<th>コード</th>";
                echo "<td><input type=text name=category_id value=".$_POST['category_id']." readonly></td>";
                echo "</tr>";

                // カテゴリ名のみ編集可能にする
                echo "<tr>";
                echo "<th>カテゴリ名</th>";
                echo "<td><input type=text name=category_name value=".$_POST['category_name']."></td>";
                echo "</tr>";
                echo "</table>";

                echo "<input type=submit value=更新>";
            echo "</form>";

        ?>
    </body>
</html>