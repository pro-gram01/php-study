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
    <table>
    <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>
    @endforeach
    </table>
@endsection

<!-- セクションと文字列を設定 -->
@section('footer')
    copyright 2022 XXXXX.
@endsection
