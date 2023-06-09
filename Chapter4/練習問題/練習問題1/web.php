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

use App\Http\Middleware\OmikujiMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('omikuji', 'OmikujiController@input');
// postされたときのみミドルウェアを指定する
Route::post('omikuji', 'OmikujiController@omikuji') -> middleware('omikuji');