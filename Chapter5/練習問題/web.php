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

Route::get('hello', 'EmployeeController@index');
// Route::post('hello', 'EmployeeController@index');

Route::get('hello/add', 'EmployeeController@add');
Route::post('hello/add', 'EmployeeController@create');

Route::get('hello/edit', 'EmployeeController@edit');
Route::post('hello/edit', 'EmployeeController@update');

Route::post('hello/del', 'EmployeeController@remove');
