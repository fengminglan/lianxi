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
//官网首页
Route::get('/', 'Index\IndexController@index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login','Web\UserController@login');
Route::post('/add','Web\UserController@add');
Route::post('/update','Web\UserController@update');
Route::get('/selectByAppId','Web\UserController@selectByAppId');
Route::get('/selectByAppIds/{AppId}','Web\UserController@selectByAppIds');
Route::group(['prefix'=>'index'],function(){

});


Route::group(['prefix'=> 'admin' ],function (){
    Route::get('/index','Admin\IndexController@index');
    Route::get('/jump/{string}','Admin\IndexController@jump');
});

