<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        // 前処理(コントロール接続前)
        // $data = [
        //     ['name' => 'taro', 'mail' => 'taro@yamada'],
        //     ['name' => 'hanako', 'mail' => 'hanako@tanaka'],
        //     ['name' => 'jiro', 'mail' => 'jiro@suzuki'],
        // ];
        // // mergeでdataという項目で、$dataの内容を追加する
        // $request -> merge(['data' => $data]);
        // return $next($request);

        // 後処理(コントロール接続後)
        $response = $next($request);
        $content = $response -> content();
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);
        $response -> setContent($content);
        return $response;
    }
}
