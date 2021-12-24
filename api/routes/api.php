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

Route::get('/get', 'App\Http\Controllers\ApiController@getAll');
Route::post('/create', 'App\Http\Controllers\ApiController@create');
Route::get('/edit/{id}', 'App\Http\Controllers\ApiController@edit');
Route::post('/update', 'App\Http\Controllers\ApiController@update');
Route::get('/delete/{id}', 'App\Http\Controllers\ApiController@delete');