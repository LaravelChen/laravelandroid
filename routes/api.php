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