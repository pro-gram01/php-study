<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        // 連想配列でデータを定義
        // $data = ['one', 'two', 'three', 'four', 'five'];
        // $data = [['name' => '山田太郎', 'mail' => 'taro@yamada'],
        //          ['name' => '田中花子', 'mail' => 'hamnako@tanaka'],
        //          ['name' => '鈴木二郎', 'mail' => 'jiro@suzuki']];
        // return view('hello.index', ['data' => $data]);
        return view('hello.index', ['message' => 'Hello!']);
    }
    // postされたときの処理
    // public function post(Request $request) {
        // テキストボックスに入力された値を取り出す
        // $msg = $request->msg;
        // その内容を反映させる
        // $data = ['msg'=>'こんにちは、' . $msg . 'さん!'];
        // return view('hello.index', ['msg'=>$request->msg]);
    // }
    
}
