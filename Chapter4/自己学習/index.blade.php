<!-- レイアウトの継承設定(フォルダ名,ファイル名) -->
@extends('layouts.helloapp')
<!-- 埋めこむセクション名と表示する値を設定 -->
@section('title', 'Index')

<!-- 親セクションの@showに埋め込む -->
@section('menubar')
    @parent
    インデックスページ
@endsection

<!-- セクションとpタグを設定 -->
@section('content')
    <p>{{$msg}}</p>
    @if (count($errors) > 0)
        <p>入力に問題があります。再入力してください。</p>
    @endif

    <form action="/hello" method="post">
    <table>
        <!-- フィールドごとにエラーを表示する -->
        @csrf
        @if ($errors->has('msg'))
            <tr><th>ERROR</th><td>{{$errors->first('msg')}}</td></tr>
        @endif
        <tr><th>Message: </th><td><input type="text" name="msg"
            value="{{old('msg')}}"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection

<!-- セクションと文字列を設定 -->
@section('footer')
    copyright 2022 XXXXX.
@endsection
