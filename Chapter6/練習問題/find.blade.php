<html>
<head>
    <title>あいまい検索結果</title>
</head>

<body>
    <h1>あいまい検索結果</h1>

    @if (isset($items))
        <table border="1">
            <tr><th>社員コード</th><th>社員名</th></tr>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->getCode()}}</td>
                <td>{{$item->getName()}}</td>
            </tr>
            @endforeach
        </table>
    @endif

</body>
</html>