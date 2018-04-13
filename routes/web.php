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

Route::get('/register', function () {
    return view('welcome');
});

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
    'middleware' => 'auth',
    'as' => 'reportStore',
    'uses' => 'AdminReportController@index'
]);

// CSVDL
Route::get('/report/csv', [
    'middleware' => 'auth',
    'as' => 'reportCsv',
    'uses' => 'AdminReportController@getCsv'
]);

// 構成編集画面
Route::post('/report/update/{id}', [
    'middleware' => 'auth',
    'as' => 'reportStore',
    'uses' => 'AdminReportController@update'
]);

// 担当構成編集
Route::get('/report/edit/{token}', [
    'middleware' => 'auth',
    'as' => 'reportStore',
    'uses' => 'AdminReportController@edit'
]);

// 構成編集画面
Route::post('/contact/report/update/{id}', [
    'middleware' => 'auth',
    'as' => 'reportStore',
    'uses' => 'ReportController@update'
]);

// 構成編集画面
Route::get('/contact/report/{token}', [
    'as' => 'reportStore',
    'uses' => 'ReportController@edit'
]);

// インポート画面
Route::get('/report/import', [
    'middleware' => 'auth',
    'as' => 'reportImport',
    'uses' => 'ReportController@import'
]);

// エクスポーと画面
Route::get('/report/export', [
    'middleware' => 'auth',
    'as' => 'reportExport',
    'uses' => 'ReportController@export'
]);
