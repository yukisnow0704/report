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

Auth::routes();

Route::get('logout', [
    'middleware' => 'auth',
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::get('/home', 'HomeController@index')->name('home');

// 構成一覧
Route::get('/report', [
    'as' => 'reportStore',
    'uses' => 'AdminReportController@index'
]);

// 担当構成編集
Route::get('/report/{token}', [
    'as' => 'reportStore',
    'uses' => 'AdminReportController@edit'
]);

// 構成編集画面
Route::get('/contact/report/{token}', [
    'as' => 'reportStore',
    'uses' => 'ReportController@edit'
]);
