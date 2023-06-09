<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OmikujiController extends Controller{
    public function omikuji(){
    // 大吉(1/6),吉(1/2),小吉(1/6),凶(1/6) ※確率
    // $num = mt_rand(1,98);
    // if($num <= 16){
    //     $result = '大吉';
    // }elseif($num <= 66){
    //     $result = '吉';
    // }elseif($num <= 82){
    //     $result = '小吉';
    // }elseif($num <= 98){
    //     $result = '凶';
    // }

    // おみくじの確立を連想配列で定義
    $omikuji = array(
        // ($key => $probability)
        "大吉" => 16.6,  // "大吉"<=16.6
        "小吉" => 16.6,  // "小吉"<=33.2
        "凶" => 16.6,    // "凶"<=49.8
        "吉" => 50.2,    // 49.9=>"大吉"
    );

    // 0から100までの乱数を生成
    // $rand = mt_rand(0, 1000) / 10;
    // 乱数の最大値を100設定
    $max = 100;
    $sum = 0;
    // echo "最大値：" .mt_getrandmax();
    // 小数第1位の乱数を生成(丸め処理)(範囲：0～100) ※mt_getrandmax() * $maxで最大値を100に設定
    $rand = round(mt_rand() / mt_getrandmax() * $max, 1);
    
    foreach($omikuji as $key => $probability){
        $sum += $probability;
        // 確率の合計と乱数を比較する(条件満たしていなかったら次の配列要素を見る→else)
        if($rand <= $sum) {
            // echo "乱数:" . $rand.", 合計:".$sum;
            $result = $key;
            break;
        // }else{
            // echo "(else) 乱数:" . $rand.", 合計:".$sum . "<br>";
        }
    }
    // return $key;

    return <<<EOF

<html>
<head>
<title>おみくじサイト</title>
</head>
<body>
    <h1>おみくじ結果</h1>
    <p>{$result}</p>
</body>
</html>
EOF;
    
    }
}