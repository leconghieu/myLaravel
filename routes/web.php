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
Route::get('dangnhap', ['as' => 'formdangnhap', 'uses' => 'userController@dangNhap']);
Route::post('check-dang-nhap', ['as' => 'checkdangnhap', 'uses' => 'userController@checkDangNhap']);

Route::get('dangky', ['as' => 'formdangky', 'uses' => 'userController@dangKy']);
Route::post('check-dang-ky', ['as' => 'checkdangky', 'uses' => 'userController@checkDangKy']);

Route::get('dangxuat', ['as' => 'dangxuat', 'uses' => 'userController@dangxuat']);

Route::group(['prefix' => 'admin', 'middleware' => 'loginStatus'], function(){
    Route::get('/', 'homeController@home')->name('home');


	Route::group(['prefix' => 'loaitin'], function(){
		Route::get('danhsach', 'loaitinController@xemdanhsach')->name('xemds');
		Route::get('them', 'loaitinController@themdanhsach')->name('themds');
		Route::get('xoa', 'loaitinController@xoadanhsach')->name('xoaloaitin');

		Route::get('updateLoaitin/{id}', 'loaitinController@updateLoaitin')->name('updateLoaitin');
		Route::post('updateLoaitin', 'loaitinController@update')->name('updateLoai');

		
	});
	Route::group(['prefix' => 'tintuc'], function(){
		Route::get('danhsach', 'tintucController@xemdanhsach')->name('xemtt');
		Route::get('them', 'tintucController@themdanhsach')->name('themtt');
		Route::get('xoa', 'tintucController@xoadanhsach')->name('xoatintuc');

        Route::get('updateTintuc/{id}', 'tintucController@updateTintuc')->name('updateTintuc');
        Route::post('updateTintuc', 'tintucController@update')->name('updateTin');
	});
});	
Route::post('addloai', ['as' => 'addloai', 'uses' => 'loaitinController@add']);
Route::post('addTintuc', ['as' => 'addTintuc', 'uses' => 'tintucController@add']);


