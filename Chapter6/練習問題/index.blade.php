<html>
<head>
    <title>社員情報一覧</title>
</head>

<body>
    <h1>社員情報一覧</h1>
    @if ($items != null)
        <table border="1">
        <tr><th>社員コード</th><th>社員名</th><th>更新</th><th>削除</th></tr>
        @foreach($items as $item)
        <tr>
        <td>{{$item->employee_code}}</td>
        <td>{{$item->employee_name}}</td>
        <td>
            <form method="GET" action="/hello/edit">
                <input type="hidden" name="editcode" value="{{$item->employee_code}}">
                <input type="submit" value="更新">
            </form>
        </td>
        <td>
            <form method="POST" action="/hello/del">
                @csrf
                <input type="hidden" name="delcode" value="{{$item->employee_code}}">
                <input type="submit" value="削除">
            </form>
        </td>
        </tr>
        @endforeach
        </table>
        <a href="/hello/add">新規登録</a>

        <br><br>

        <lavel>あいまい検索</lavel>
        <form method="POST" action="/hello/find">
            <table border="1">
                @csrf
                <tr>
                    <th>社員名</th><td><input type="text" name="employee_name"></td>
                </tr>
            </table>
            <input type="submit" value="検索">
        </form>

        @if (count($errors) > 0)
            <div>
                <ul>
                @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

    @endif
</body>
</html>