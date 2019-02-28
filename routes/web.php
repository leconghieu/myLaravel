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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'homeController@home')->name('home');
	Route::group(['prefix' => 'loaitin'], function(){

		Route::get('danhsach', 'loaitinController@xemdanhsach')->name('xemds');
		Route::get('them', 'loaitinController@themdanhsach')->name('themds');
		Route::get('xoa', 'loaitinController@xoadanhsach')->name('xoaloaitin');
		
	});
	Route::group(['prefix' => 'tintuc'], function(){

		Route::get('danhsach', 'tintucController@xemdanhsach')->name('xemtt');
		Route::get('them', 'tintucController@themdanhsach')->name('themtt');
		Route::get('xoa', 'tintucController@xoadanhsach')->name('xoatintuc');
	});
});	
Route::post('addloai', ['as' => 'addloai', 'uses' => 'loaitinController@add']);
Route::post('addTintuc', ['as' => 'addTintuc', 'uses' => 'tintucController@add']);

Route::get('demo', 'loaitinController@demo');
