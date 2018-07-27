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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/directory/{path?}', ['uses' => 'ReactController@index', 'as' => 'react', 'where' => ['path' => '.*']]);
Route::get('/uploadImage', ['uses' => 'UploadImageController@upload', 'as' => 'uploadImage']);
Route::get('/dictionary', 'Database\UploadDictionary@getDirectories')->name('dictionary');
Route::get('/news', 'Database\UploadNews@getNews')->name('news');