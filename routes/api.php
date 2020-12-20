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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/store', ['uses'=> 'App\Http\Controllers\PhotoController@store']);
Route::get('/show/{filename}', ['uses'=> 'App\Http\Controllers\PhotoController@show']);
Route::get('/show_test', ['uses'=> 'App\Http\Controllers\PhotoController@showTest']);
Route::get('/showAll', ['uses'=> 'App\Http\Controllers\PhotoController@getAll']);