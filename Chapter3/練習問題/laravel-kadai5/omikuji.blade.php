<!-- 初期表示(名前入力) -->
<html>

<head>
    <title>おみくじ</title>
</head>

<body>
    <h1>おみくじ</h1>
    <!-- actionはコントローラーのomikujiメソッドを設定する(一度コントローラーを軽油) -->
    <form method="POST" action="/omikuji">
            @csrf
        名前：<input type="text" name="name">
        <input type="submit" value="占う">
    </form>

</body>

</html>

