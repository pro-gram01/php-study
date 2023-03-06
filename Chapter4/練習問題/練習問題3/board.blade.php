<!-- 初期表示(名前、投稿内容入力) -->
<html>

<style>
    #errorMsg{
        color:red;
    }

    #successMsg{
        color:blue;
    }
</style>

<head>
    <title>掲示板</title>
</head>

<body>
    <h1>掲示板</h1>
    <!-- actionはコントローラーのboardメソッドを設定する(一度コントローラーを軽油) -->
    <form method="POST" action="/apply">
        @csrf
        <input type="text" name="name" placeholder="名前"
        value="{{old('name')}}">
        
        <div id ="errorMsg">
            @error('name')
                <tr><th>エラー：</th>
                <td>{{$message}}</td></tr>
            @enderror
        </div>

        <p>
            今の気分
        <select name="mood">
            <option >&#128512;</option>
            <option selected>&#128578;</option>
            <option >&#128552;</option>
        </select>
        </p>

        <textarea name="write" rows="3" cols="25" placeholder="書き込み">{{old('write')}}</textarea>

        <div id ="errorMsg">
            @error('write')
                <tr><th>エラー：</th>
                <td>{{$message}}</td></tr>
            @enderror
        </div>

        <br>

        <input type="submit" value="投稿する"><br>

        
        <div id ="successMsg">
            @isset($successMsg)
                <p>{{$successMsg}}</p>
            @endisset
        </div>
        
    </form>
    
    <hr>

    <table border="1">
        <tr>
            <th>日時</th>
            <th>名前</th>
            <th>気分</th>
            <th>書き込み</th>
        </tr>

    @isset($contentsList)
        @foreach($contentsList as $record)
         <tr>
            <td>{{$record['time']}}</td>
            <td>{{$record['name']}}</td>
            <td>{{$record['mood']}}</td>
            <td>{{$record['write']}}</td>
        </tr>
        @endforeach
    @endisset

    </table>

    <a href="/clear">すべてクリアする</a>

</body>

</html>