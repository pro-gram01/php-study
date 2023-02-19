<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>占い結果</title>
</head>
<body>
  <h1>占い結果</h1>
  <?php
    $month = $_GET["month"]."月の運勢は、、、<br />";

    $colors = ["赤", "黄色", "白"];
    $i = mt_rand(0, 2);
    $color = "ラッキーカラー：".$colors[$i]."<br/>";

    $items = ["タオル", "カバン", "腕時計"];
    $i = mt_rand(0, 2);
    $item = "ラッキーアイテム：".$items[$i]."<br/>";

    $i = mt_rand(1, 12);
    $rank = "順位は：".$i."位<br/>";

    $fortune = $month.$color.$item.$rank;
    echo $fortune;

    // セッションスタート
    session_start();

    // セッションの存在チェック
    if (!isset($_SESSION["fortunes"])) {
      // 存在しない場合は空配列をセッションに保存(初回のみ実行)
      $_SESSION["fortunes"] = array();
    }

    // セッションを取得()
    $fortunes = $_SESSION["fortunes"];

    // セッションから取得した配列に要素を追加
    // array_push($fortunes, $fortune); と同じ処理
    $fortunes[] = $fortune;

    // セッションに保存
    $_SESSION["fortunes"] = $fortunes;
  ?>
  <p><a href="fortune_history.php">今までの占い結果を見る</a></p>
  <p><a href="index.html">戻る</a></p>
</body>
</html>