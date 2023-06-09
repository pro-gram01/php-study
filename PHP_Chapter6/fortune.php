<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>占い結果</title>
    </head>
    <body>
        <h1>占い結果</h1>   
        <?php
            // 選択された月を取得
            $month = $_GET['month']."の運勢は、、、<br>";
            // echo(htmlspecialchars($_GET['month'], ENT_QUOTES)) ."の運勢は、、、<br>";
            // echo $month;

            // ラッキーカラー
            $colors = array("赤","黄","白");
            $c_key = array_rand($color,1);
            // echo "ラッキーカラー：" .$color[$c_key] ."<br>";
            $color = "ラッキーカラー：" .$color[$c_key] ."<br>";

            // $color_ary = array($color);
            // array_push($color_ary, $color);
            // $col_result = $color_ary;

            // ラッキーアイテム
            $items = array("タオル","カバン","腕時計");
            $i_key = array_rand($item,1);
            // echo "ラッキーアイテム：" .$item[$i_key] ."<br>";
            $item = "ラッキーアイテム：" .$item[$i_key] ."<br>";
            // $item_ary = array($item[$i_key]);

            // 順位(1～12位)
            $rank_int = random_int(1,12);
            $rank = "順位は：".$rank ."位 <br>";
            // echo $rank_show;
            // $rank_ary = $rank_show;

            $fortune = $color.$item.$rank;
            echo $fortune;

            // 2回目以降はセッションから値をとってきて、その後ろに要素を追加する
            // セッションがあるか判定する関数を調べる → isset
            if(!isset($_SESSION["fortunes"])) {
                // 存在しない場合は空配列をセッションに保存(初回占い時のみ実行)
                 $_SESSION["fortunes"] = array();
                // セッションから月データを取得する
                // $son_mon = $_SESSION["fortunes"];
                // 配列に取得した月データを追加
                // $month_ary = array($month);
                // array_push($son_mon, $month);
                // 配列をセッションに保存
            }
                // 初回占いの場合、選択した月を配列に追加
                // $month_ary = array($month);
                // array_push($month_ary, $month);
                // 配列をセッションに保存

            // $mon_result = $month_ary;
            
            // 各項目の占い結果履歴Sessionに保存
            // 占い2回目以降はSessionに値が保存されているかチェックする。
            // セッションを取得
            $fortunes = $_SESSION["fortunes"];

            // セッションから取得した配列に要素を追加
            // array_push($fortunes, $fortune); と同じ処理
            $fortunes[] = $fortune;

            // セッションに保存
            $_SESSION['fortunes'] = $fortunes;

        ?>

        <p><a href="forture_history.php">今までの占い結果を見る</a></p>
        <p><a href="index.html">戻る</a></p>
    </body>
</html>