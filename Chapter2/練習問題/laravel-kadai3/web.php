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

Route::get('/', function () {
    return view('welcome');
});

// コントローラー側は__invokeメソッドで定義されているため、アクションの指定(@～)は不要
Route::get('birthday/{year?}/{month?}/{day?}', 'AgeController');