<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/user', 'UserController@store');
Route::post('/session','UserController@login');
Route::put('/user','UserController@edit');
Route::delete('/user','UserController@destroy');
Route::post('/todo','TodoController@store');
Route::put('/todo','TodoController@edit');
Route::delete('/todo','TodoController@destroy');
Route::get('/todo','TodoController@show');
