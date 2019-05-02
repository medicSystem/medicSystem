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
Route::get('news', 'NewsController@list');
Route::get('news/{id}', 'NewsController@getNewsById');
Route::get('news/{type}', 'NewsController@getNews');
Route::get('dictionary/{category}', 'DictionaryController@getDirectories');
Route::get('dictionary', 'DictionaryController@getAll');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
