<html>
<head>
    <title>社員情報登録</title>
</head>

<body>

    <h1>社員情報登録</h1>

    <form action="/hello/add" method="post">
        <table border="1">
            @csrf
            <tr>
                <th>社員名</th><td><input type="text" name="addname"></td>
            </tr>
        </table>
        <input type="submit" value="登録">
    </form>

</body>
</html>