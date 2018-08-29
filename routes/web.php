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
Route::get('/newsList', 'Database\UploadNews@list')->name('news_list');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:admin', 'ban_list']], function () {
        Route::get('/admin', ['uses' => 'AdminController@index'])->name('admin');
        Route::get('/admin/{path?}', ['uses' => 'ReactAdminController@index', 'as' => 'reactAdmin', 'where' => ['path' => '.*']]);

        Route::get('/banList', 'Database\UsersController@banList')->name('ban_list');
        Route::get('/usersList', 'Database\UsersController@list')->name('users_list');
        Route::post('/addBan/{id}', 'Database\UsersController@banUser')->name('ban_user');
        Route::get('/returnUser/{id}', 'Database\UsersController@returnUser')->name('return_user');

        Route::get('/viewNewValidate', 'Database\ValidateDoctorsController@listNew')->name('listNew');
        Route::get('/viewRefutedValidate', 'Database\ValidateDoctorsController@listRefuted')->name('listRefuted');
        Route::get('/confirmationValidate/{id}', 'Database\ValidateDoctorsController@confirmation')->name('confirmation');
        Route::get('/confutationValidate/{id}', 'Database\ValidateDoctorsController@confutation')->name('confutation');

        Route::post('/addNews', 'Database\UploadNews@addNews')->name('addNews');
        Route::get('/deleteNews/{id}', 'Database\UploadNews@deleteNews')->name('deleteNews');
        Route::post('updateNews/{id}', 'Database\UploadNews@updateNews')->name('updateNews');

        Route::post('/addDirectory', 'Database\UploadDictionary@addDirectory')->name('addDirectory');
        Route::get('/deleteDirectory/{id}', 'Database\UploadDictionary@deleteDirectory')->name('deleteDirectory');
        Route::post('/updateDirectory/{id}', 'Database\UploadDictionary@updateDirectory')->name('updateDirectory');

        Route::get('/deleteCoupon/{id}', 'Database\CouponsController@delete')->name('deleteCoupon');
    });

    Route::group(['middleware' => ['role:doctor', 'ban_list']], function () {
        Route::group(['middleware' => ['validating_doctor']], function (){
            Route::get('/doctor', ['uses' => 'DoctorController@index'])->name('doctor');
            Route::get('/doctor/{path?}', ['uses' => 'ReactDoctorController@index', 'as' => 'reactDoctor', 'where' => ['path' => '.*']]);

            Route::get('/deleteNotActive/{id}', 'Database\CouponsController@deleteNotActive')->name('deleteNotActive');

            Route::get('/patientsList', 'Database\PatientsController@patientsList')->name('patientsList');

            Route::get('/listActiveCouponByDoctorId', 'Database\CouponsController@listActiveCouponByDoctorId')->name('listActiveCouponByDoctorId');
            Route::get('/listNotActiveCouponByDoctorId', 'Database\CouponsController@listNotActiveCouponByDoctorId')->name('listNotActiveCouponByDoctorId');

            Route::get('/getMedicalCardForDoctor/{id}', 'Database\MedicalCardController@getMedicalCardForDoctor')->name('getMedicalCardForDoctor');
            Route::get('/getDiseaseHistoryByDoctorId', 'Database\MedicalCardController@getDiseaseHistoryByDoctorId')->name('getDiseaseHistoryByDoctorId');
            Route::get('/getDiseaseHistoryByMedicalCardId/{id}', 'Database\MedicalCardController@getDiseaseHistoryByMedicalCardId')->name('getDiseaseHistoryByMedicalCardId');
            Route::get('/getDiseaseHistoryByDoctorIdAndMedicalCardId/{medical_card_id}', 'Database\MedicalCardController@getDiseaseHistoryByDoctorIdAndMedicalCardId')->name('getDiseaseHistoryByDoctorIdAndMedicalCardId');
        });

        Route::get('/validatingDoctor', 'ValidatingDoctor@index')->name('validating_doctor');
        Route::get('/viewValidatePage', 'Database\ValidateDoctorsController@viewValidatePage')->name('viewValidatePage');
        Route::post('/addValidate', 'Database\ValidateDoctorsController@addValidate')->name('addValidate');
    });

    Route::group(['middleware' => ['role:patient', 'ban_list']], function () {
        Route::get('/patient', ['uses' => 'PatientController@index'])->name('patient');
        Route::get('/patient/{path?}', ['uses' => 'ReactPatientController@index', 'as' => 'reactPatient', 'where' => ['path' => '.*']]);
        Route::get('/medicalCard', 'ViewMedicalCardController@index')->name('viewMedicalCard');
        Route::get('/addMedicalCard', 'UserTypeController@addMedicalCard')->name('addMedicalCard');

        Route::post('/addCoupon', 'Database\CouponsController@add')->name('addCoupon');

        Route::get('/getDoctors/{type_name}', 'Database\DoctorsController@getDoctors')->name('getDoctors');

        Route::get('/getBusyTime/{id}/{needDate}', 'Database\DoctorsController@getBusyTime')->name('getBusyTime');
        Route::get('/getFreeTime/{id}/{needDate}', 'Database\DoctorsController@getFreeTime')->name('getFreeTime');

        /*Route::get('/getMedicalCardForPatient', 'Database\MedicalCardController@getMedicalCardForPatient')->name('getMedicalCardForPatient');*/
    });

    Route::group(['middleware' => 'ban_list'], function () {
        Route::get('/home', 'UserTypeController@control')->name('control');

        Route::get('/uploadImage/{dir}/{divName}', ['uses' => 'UploadImageController@upload', 'as' => 'uploadImage']);
        Route::get('/deleteImage/{db}/{columnName}/{id}/{dir}', ['uses' => 'UploadImageController@delete', 'as' => 'deleteImage']);
        Route::get('/viewImage/{db}/{columnName}/{id}/{dir}', ['uses' => 'UploadImageController@delete', 'as' => 'deleteImage']);

        Route::get('/getActiveCoupon', 'Database\CouponsController@listActiveCoupon')->name('listActiveCoupon');
        Route::get('/getNotActiveCoupon', 'Database\CouponsController@listNotActiveCoupon')->name('listNotActiveCoupon');

        Route::get('/getDoctor/{id}', 'Database\DoctorsController@getDoctor')->name('getDoctor');
        Route::get('/getWorkTime/{id}', 'Database\DoctorsController@getWorkTime')->name('getWorkTime');

        Route::get('/getPatientById/{id}', 'Database\PatientsController@getPatientById')->name('getPatientById');
    });

    Route::get('/errorRole/{role}', ['uses' => 'ErrorRoleController@index'])->name('errorRole');
    Route::get('banUser/{first_name}/{last_name}', ['uses' => 'BanUserController@index'])->name('banUser');
});


Route::get('/test', 'TestController@index')->name('test');
