<!-- カテゴリ更新処理 -->
<?php

    // dbconnect.phpを取り込む
    require('dbconnect.php'); 

    // カテゴリ更新(ページ)update.phpで更新されたカテゴリ名をカテゴリ一覧(categoryテーブル)に更新
    // $statement = $db->prepare('INSERT INTO category SET category_name=? ');
    $statement = $db->prepare('UPDATE category SET category_name=? WHERE category_id=?');
    // $statement -> execute(array($_POST['category_name'],$_POST['category_id']));
    // bindParam(preapreSQLの?の順番, ?に代入したい値)
    $statement -> bindParam(1,$_POST['category_name']);  // 左から1番目の?
    $statement -> bindParam(2,$_POST['category_id']);   // 左から2番目の?
    $statement -> execute();

    // echo $_POST['category_id'];
    // echo $_POST['category_name'];

    // DBに追加後、カテゴリー覧ページに遷移する
    header("Location:index.php");
    exit;

?>