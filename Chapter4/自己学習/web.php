<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// view('フォルダ名'.ファイル名')でテンプレートを表示する
// Route::get('hello', function() {
//     return view('hello.index');
// });

// Route::get('hello', 'HelloController@index');
// Route::post('hello', 'HelloController@post');

// Route::get('hello', 'HelloController@index') -> middleware('hello');
Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');
