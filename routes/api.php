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

Route::post('/register', 'RegisterController@register');

Route::group(['prefix' => 'post'], function () {
    Route::get('/', 'PostController@index')->middleware('auth:api');
    Route::post('/', 'PostController@add')->middleware('auth:api');
    Route::post('/upload', 'PostController@fileUpload')->middleware('auth:api');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index')->middleware('auth:api');
    Route::post('/add-instagram', 'UserController@addInstagram')->middleware('auth:api');
});