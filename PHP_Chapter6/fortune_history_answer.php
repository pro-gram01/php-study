<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>占い結果履歴</title>
</head>
<body>
  <h1>占い結果履歴</h1>
  <?php
    session_start();
    $fortunes = $_SESSION["fortunes"];
    foreach($fortunes as $value) {
      echo $value;
      echo "<hr>";
    }
  ?>
  <p><a href="index.html">戻る</a></p>
</body>
</html>