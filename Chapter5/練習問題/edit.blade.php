<html>
<head>
    <title>社員情報更新</title>
</head>

<body>

    <h1>社員情報更新</h1>

    <form action="/hello/edit" method="post">
        <table border="1">
            @csrf
            <tr>   
                <th>社員コード</th>
                <td><input type="text" name="editcode" value="{{$form->employee_code}}" readonly></td>
            </tr>
            <tr>
                <th>社員名</th>
                <td><input type="text" name="editname" value="{{$form->employee_name}}"></td>
            </tr>
        </table>
        <input type="submit" value="更新">
    </form>
    
    
</body>
</html>