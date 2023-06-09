<!-- カテゴリ登録処理 -->
<?php
    // dbconnect.phpを取り込む
    require('dbconnect.php'); 

    // カテゴリー追加(ページ)input.phpで登録されたカテゴリ名をカテゴリ一覧(categoryテーブル)に保存
    $statement = $db->prepare('INSERT INTO category SET category_name=? ');
    // $statement -> execute(array($_POST['category_name']));
    $statement -> bindParam(1,$_POST['category_name']);
    $statement -> execute();

    // DBに追加後、カテゴリー覧ページに遷移する
    header("Location:index.php");
    exit;

?>
    <!-- <br>
    <a href="index.php">カテゴリ一覧へ戻る</a> -->