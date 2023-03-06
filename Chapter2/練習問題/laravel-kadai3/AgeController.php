<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller{
    // リクエスト？レスポンス？
    public function __invoke($year='noyear', $month='nomonth', $day='noday'){
        // $year = $request -> input('year');
        // echo $year;
        // echo $month;
        // echo $day;

        // 今日の日付を取得(20220127の形で取得)
        $today = date('Ymd');
        
        // 生年月日をルートパラメーターから取得
        $birthday = $year . $month . $day;
        // echo $birthday;

        // ((今日の日付-生年月日)) / 10000 で現時点での年齢を取得する
        $age = floor(($today - $birthday) / 10000);

// $html = <<<EOF
return <<< EOF
<html>
<head>
<title>現在の年齢計算</title>
</head>
<body>
<p>生年月日は{$year}年{$month}月{$day}日です。</p>
<p>現在{$age}歳です。</p>
</body>
</html>
EOF;
    }
}