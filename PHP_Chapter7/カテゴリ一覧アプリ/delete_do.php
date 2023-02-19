<!-- カテゴリ削除処理 -->
<?php

    // dbconnect.phpを取り込む
    require('dbconnect.php'); 

    // カテゴリ一覧(index.php)で削除されたデータを削除
    // $statement = $db->prepare('INSERT INTO category SET category_name=? ');
    $statement = $db->prepare('DELETE FROM category WHERE category_id=?');
    // $statement -> execute(array($_POST['category_name'],$_POST['category_id']));
    // bindParam(preapreSQLの?の順番, ?に代入したい値)
    // $statement -> bindParam(1,$_POST['category_name']);  // 左から1番目の?
    $statement -> bindParam(1,$_POST['category_id']);   // 左から1番目の?
    $statement -> execute();

    // echo "削除対象カテゴリid<br>";
    // echo $_POST['category_id'];

    // DBに追加後、カテゴリー覧ページに遷移する
    header("Location:index.php");
    exit;

?>