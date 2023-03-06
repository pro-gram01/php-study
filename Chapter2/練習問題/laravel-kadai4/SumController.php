<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumController extends Controller{
    public function sum($num){
        $total = 0;
        // 1からルートパラメーターまでの合計値を計算
        for($val=1; $val<=$num; $val++) {
            $total += $val;
        }
        return <<<EOF
<html>
<head>
<title>合計値計算</title>
</head>
<body>
<p>ルートパラメーター：{$num}</p>
<p>合計値：{$total}</p>
</body>
</html>
EOF;
    }
}
