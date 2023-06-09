<!-- 入力された名前とおみくじ結果を表示する -->
<html>

<head>
    <title>おみくじ結果</title>
</head>

<body>
    <h1>おみくじ結果</h1>
    
    @if($name != '')
        <p>こんにちは、{{$name}}さん！</p>
    @else
        <p>こんにちは、ゲストさん！</p>
    @endif

    <p>今日の運勢は．．．{{$result}}です。</p>

</body>

</html>