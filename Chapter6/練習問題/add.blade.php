<html>
<head>
    <title>社員情報登録</title>
</head>

<body>

    <h1>社員情報登録</h1>

    @if (count($errors) > 0)
    <div>
        <ul>
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="/hello/add" method="post">
        <table border="1">
            @csrf
            <tr>
                <th>社員名</th><td><input type="text" name="employee_name"
                value="{{old('employee_name')}}"></td>
            </tr>
        </table>
        <input type="submit" value="登録">
    </form>

</body>
</html>