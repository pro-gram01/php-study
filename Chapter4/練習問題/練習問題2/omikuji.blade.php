<!-- 初期表示(名前入力) -->
<html>

<head>
    <title>おみくじ</title>
</head>

<body>
    <h1>おみくじ</h1>

    <!-- バリデーションチェックでエラーの場合、
    (バリデーションチェックでのエラーメッセージが$errosに保存される) -->
    @if (count($errors) > 0)
        <p>エラー：名前は必ず入力して下さい。</p>
    @endif

    <!-- actionはコントローラーのomikujiメソッドを設定する(一度コントローラーを経由) -->
    <form method="post" action="/omikuji">
        @csrf
        <tr><th>名前：</th><td><input type="text" name="name"
            value="{{old('name')}}"></td></tr>
        <input type="submit" value="占う">
    
    </form>
</body>

</html>

