<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller{
    public function hello($name='noname', $age='noage'){
        // URLの年齢に10を加える
        $age += 10;
        return <<<EOF
<html>
<head>
<title>10年後の計算サイト</title>
</head>
<body>
    <p>こんにちは{$name}さん、10年後は{$age}歳ですね。</p>
</body>
</html>
EOF;
    }
}