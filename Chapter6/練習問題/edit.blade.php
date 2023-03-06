<html>
<head>
    <title>社員情報更新</title>
</head>

<body>

    <h1>社員情報更新</h1>

    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="/hello/edit" method="post">
        <table border="1">
            @csrf
            <tr>   
                <th>社員コード</th>
                <td><input type="text" name="employee_code" value="{{$form->employee_code}}" readonly></td>
            </tr>
            <tr>
                <th>社員名</th>
                <td><input type="text" name="employee_name" value="{{$form->employee_name}}"></td>
            </tr>
        </table>
        <input type="submit" value="更新">
    </form>
    
    
</body>
</html>