<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Validator;
use App\Http\Validators\HelloValidator;
// use App\Rules\Myrule;


class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    // registerメソッド：サービスコンテナへの登録
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    // bootメソッド：ブートストラップ(自動実行処理)
    public function boot(){
        // views/hello/index.blade.phpのview_messageに値を追加する
        // View::composer('hello.index', function($view) {$view->with('view_message', 'composer message!');});
        // 第1引数に'指定するbladeファイル','第2引数に呼び出すビューコンポーザークラス'を記載する
        // View::composer('hello.index', 'App\Http\Composers\HelloComposer');

        // 複数のコントローラーで利用の場合のルール作成
        // $validator = $this->app['validator'];
        // $validator->resolver(function($translator, $data, $rules, $messages) {
        //     return new HelloValidator($translator, $data, $rules, $messages);
        // 1つのコントローラーの場合のルール作成
        Validator::extend('hello', function($attribute, $value, $parameters, $validator) {
            return $value % 2 == 0;
        });
    }
}
