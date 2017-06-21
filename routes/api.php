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
Route::post('/user_register', 'UsersController@register');
Route::post('/user_login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');
Route::get('/is_auth', 'UsersController@is_auth');
Route::post('/set_name', 'UsersController@set_name');
Route::post('/set_birthday', 'UsersController@set_birthday');
Route::post('/set_info', 'UsersController@set_info');
Route::post('/set_sex', 'UsersController@set_sex');