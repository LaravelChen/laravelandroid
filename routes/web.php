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
Route::post('/user_login', 'UsersController@login');
Route::post('/user_register','UsersController@register');
Route::get('/logout','UsersController@logout');
Route::get('/is_auth','UsersController@is_auth');