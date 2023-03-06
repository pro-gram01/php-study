<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OmikujiRequest;
use Validator;

class OmikujiController extends Controller{
    // 初期画面(トップページ)に遷移させる処理
    public function input(){
        return view('omikuji.omikuji');
    }
    
    // おみくじの確立を定義し、omikuji_resultに返す
    public function omikuji(Request $request){
        // バリデーションルールを設定(名前が未入力の場合はエラーを返す)
        $validate_rule = [
            'name' => 'required'
        ];
        // バリデーションチェック(エラーの場合、/omikujiページに返る)
        $this->validate($request, $validate_rule);

        // dd($request->name);
    
    // おみくじの確立を連想配列で定義(確率を設定)
    $omikuji = array(
        "大吉" => 16.6,  // "大吉"<=16.6
        "小吉" => 16.6,  // "小吉"<=33.2
        "凶" => 16.6,    // "凶"<=49.8
        "吉" => 50.2,    // 49.9=>"大吉"
    );

    // 0から100までの乱数を生成後、乱数の最大値を100設定
    $max = 100;
    $sum = 0;
    // $result = '吉';
    // 小数第1位の乱数を生成(丸め処理)(範囲：0～100) ※mt_getrandmax() * $maxで最大値を100に設定
    $rand = round(mt_rand() / mt_getrandmax() * $max, 1);
    
    foreach($omikuji as $key => $probability){
        $sum += $probability;
        // 確率の合計と乱数を比較する(条件満たしていなかったら次の配列要素を見る→else)
        if($rand <= $sum) {
            // echo "乱数:" . $rand.", 合計:".$sum;
            $result = $key;
            break;
        }
    }
        
        // 名前とおみくじの結果(ミドルウェアを利用)をomikuji_resultに返す
        return view('omikuji.omikuji_result',
        ['name' => $request->name ,
         'result' => $result]);
    }
}
