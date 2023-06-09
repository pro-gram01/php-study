<?php

namespace App\Http\Middleware;

use Closure;

class OmikujiMiddleware
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
        // 名前未入力チェック
        if(is_null($request->name)){
            // 名前未入力の場合、nameを'ゲスト'とする
            $request->name = 'ゲスト';
        }
        // 名前と占い結果を配列で定義
        $data = [
            ['name' => $request->name]
        ];

        // 名前と占い結果をマージする
        $request->merge(['data' => $data]);
        return $next($request);
        // 以降後処理(コントロール接続後)
        // $response = $next($request);
    }
}
