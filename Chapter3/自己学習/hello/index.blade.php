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

    <p>ここが本文のコンテンツです。</p>

    <p>Controller value<br>
    'message' = {{$message}}</p>

    <p>ViewComposer value<br>
    'view_message' = {{$view_message}}</p>

@endsection

<!-- セクションと文字列を設定 -->
@section('footer')
copyright 2022 XXXXX.
@endsection

