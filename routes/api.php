<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api\Controllers')->group(function (){
    Route::get('index','LessonsController@index');
    Route::post('ceshi','LessonsController@ceshi');
    Route::get('ceshi','LessonsController@getCeshi');
    Route::post('title','LessonsController@insertTitle');
    Route::post('register','LessonsController@register');
    Route::post('login','LessonsController@login');
});
Route::namespace('Api\Controllers')->group(function(){
    Route::get('lang/{lang}','LessonsController@lang');
    Route::get('test'.'UserController@test');
});


