<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request) {
        // $request->cookie()->forget('msg');
        // クッキーを取得
        if ($request->hasCookie('msg')) {
            $msg = 'Cookie=' . $request->cookie('msg');
        } else {
            $msg = '※クッキーはありません。';
        }
        return view('hello.index', ['msg' => $msg]);
        // return view('hello.index',['msg' => 'フォームを入力して下さい。']);
    }

    // postされたときの処理
    public function post(Request $request) {
        $validate_rule = ['msg' => 'required',];
        $msg = $request->msg;
        // cookieを発行し、ビューファイル,パラメータを設定
        $response = response()->view('hello.index',['msg' => '「' . $msg . '」をクッキーに保存しました。']);
        // クッキー名, 入力値, 有効期限(分)を設定
        $response->cookie('msg', $msg, 100);
        return $response;
        // return view('hello.index', ['msg' => '正しく入力されました！']);
    }    
}