<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OmikujiRequest;
use Validator;
date_default_timezone_set('Asia/Tokyo');

class BoardController extends Controller{
    // トップページのファイルを指定
    public function input(){
        // トップに戻ってもデータがあれば、テーブルに表示させたい

        return view('board.board');
    }

    // 投稿するボタンが押されたとき(テーブルにデータを追加する)
    public function apply(Request $request){
        // ルールを設定
        $rules = [
            'name' => 'required | alpha' ,
            'write' => 'required | max: 50',
        ];
        // エラーメッセージを日本語化
        $messages = [
            'name.required' => '名前は必ず入力して下さい。',
            'name.alpha' => '名前に数値は入力できません。',
            'write.required' => '書き込みは必ず入力して下さい。',
            'write.max' => '入力できる文字数は50文字までです。',
        ];

        // バリデータを作成(Validator::make(値の配列, ルールの配列, メッセージ配列)) ※値の配列→postされてきた値
        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($request->all());

        // falis→バリデーション失敗  passes→成功 かを調べられる
        if ($validator->fails()) {
            // バリデーションチェックが失敗の場合、/boardへリダイレクトする
            return redirect('/board')->withErrors($validator)->withInput();
        }else{ 
            // バリデーションチェック成功の場合は、1レコード作成し連想配列に入れ保持する
            $data = [
                'time'=>date('Y-m-d H:i:s'), // 時間
                'name'=>$request->name, // 名前
                'mood'=>$request->mood, // 気分
                'write'=>$request->write // 書き込み
            ];
            // セッション確認
            if ($request->session()->has('contentsList') == false){
                // 存在しない場合、空のリストを定義(初回投稿時のみ)
                $request->session()->put('contentsList',array());
            }
                // セッションを取得し、$contentsListに代入
                $contentsList = $request->session()->get('contentsList');
                // 取得したレコード情報を$contentsListに代入
                array_push($contentsList, $data);
                // 追加した情報をセッションに保存
                $request->session()->put('contentsList', $contentsList);
                //$contentsListの中身を表示する
                // dd($contentsList);
                // error_log(print_r($contentsList,true),"3","C:/Users/Education/Desktop/debug.log");
                // 更新したcontentsListをViewに返す
                // return view('board.board', ['contentsList' => $contentsList]);
                $successMsg = '投稿が完了しました。';
                return view('board.board', compact('contentsList', 'successMsg'));
            }
    }

    // すべてをクリアするが押されたとき
    public function clear(){

        // テーブルを全件削除する
        $contentsList = '';
        // セッションの全データを削除
        session()->forget('contentsList');

        return view('board.board');
    }
}
