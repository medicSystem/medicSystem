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

Route::get('/directory/{path?}', ['uses' => 'ReactController@index', 'as' => 'react', 'where' => ['path' => '.*']]);
Route::get('/dictionary/categoryName', 'Database\UploadDictionary@uniqueCategoryName')->name('categoryName');
Route::get('/dictionary/{category}', 'Database\UploadDictionary@getDirectories')->name('dictionary');
Route::get('/news/{type}', 'Database\UploadNews@getNews')->name('news');
Route::get('/main/{path?}', ['uses' => 'ReactController@index', 'as' => 'reactMain', 'where' => ['path' => '.*']]);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('/admin', ['uses' => 'AdminController@index'])->name('admin');
    });

    Route::group(['middleware' => 'role:doctor'], function () {
        Route::get('/doctor', ['uses' => 'DoctorController@index'])->name('doctor');
    });

    Route::group(['middleware' => 'role:patient'], function () {
        Route::get('/patient', ['uses' => 'PatientController@index'])->name('patient');
    });

    Route::get('/home', 'UserTypeController@control')->name('control');
    Route::get('/errorRole/{role}', ['uses' => 'ErrorRoleController@index'])->name('errorRole');
    Route::get('/uploadImage', ['uses' => 'UploadImageController@upload', 'as' => 'uploadImage']);
});