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
    Route::group(['middleware' => ['role:admin', 'ban_list']], function () {
        Route::get('/admin', ['uses' => 'AdminController@index'])->name('admin');
        Route::get('/admin/{path?}', ['uses' => 'ReactAdminController@index', 'as' => 'reactAdmin', 'where' => ['path' => '.*']]);
    });

    Route::group(['middleware' => ['role:doctor', 'ban_list']], function () {
        Route::get('/doctor', ['uses' => 'DoctorController@index'])->name('doctor');
        Route::get('/doctor/{path?}', ['uses' => 'ReactDoctorController@index', 'as' => 'reactDoctor', 'where' => ['path' => '.*']]);
    });

    Route::group(['middleware' => ['role:patient', 'ban_list']], function () {
        Route::get('/patient', ['uses' => 'PatientController@index'])->name('patient');
        Route::get('/patient/{path?}', ['uses' => 'ReactPatientController@index', 'as' => 'reactPatient', 'where' => ['path' => '.*']]);
    });

    Route::group(['middleware' => 'ban_list'], function () {
        Route::get('/home', 'UserTypeController@control')->name('control');
        Route::get('/uploadImage', ['uses' => 'UploadImageController@upload', 'as' => 'uploadImage']);
    });

    Route::get('/errorRole/{role}', ['uses' => 'ErrorRoleController@index'])->name('errorRole');
    Route::get('banUser/{first_name}/{last_name}', ['uses' => 'BanUserController@index'])->name('banUser');
});