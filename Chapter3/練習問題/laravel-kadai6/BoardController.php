<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardController extends Controller{
    // トップページ
    public function input(){
        return view('board.board');
    }

    // 投稿するボタンが押されたとき(テーブルにデータを追加する)
    public function apply(Request $request){
        $errorList = array();
        // 名前がまたは未入力の場合は、Viewでエラーメッセージを表示させる
        if($request->name == '' && $request->write == ''){
            $errorMsg = '名前が未入力です';
            array_push($errorList, $errorMsg);
            $errorMsg = '書き込みが未入力です';
            array_push($errorList, $errorMsg);
            return view('board.board', ['errorList' => $errorList]);
        }elseif($request->name == ''){
            // 名前のみが未入力の場合
            $errorMsg = '名前が未入力です';
            array_push($errorList, $errorMsg);
            return view('board.board', ['errorList' => $errorList]);  
        }elseif($request->write == ''){
            // 書き込みのみが未入力の場合
            $errorMsg = '書き込みが未入力です';
            array_push($errorList, $errorMsg);
            return view('board.board', ['errorList' => $errorList]);  
        }

        // 1レコード作成し、連想配列に入れ保持する
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
            // 取得したレコードをcontentsListリストに代入
            array_push($contentsList, $data);
            // 追加した情報をセッションに保存
            $request->session()->put('contentsList', $contentsList);
            //$contentsListをデバッグ
            error_log(print_r($contentsList,true),"3","C:/Users/Education/Desktop/debug.log");
            // 更新したcontentsListをViewに返す
            return view('board.board', ['contentsList' => $contentsList]);
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
