<?php

use Illuminate\Support\Facades\Route;
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


Route::prefix('admin')->namespace('Backend')->group(function(){
    Route::resource('/users', 'AuthController');

    // Route::get('/get/users','AuthController@getUser')->name('get.user');
    // Route::post('/users/store','AuthController@registerStore')->name('admin.registerStore');

    Route::get('/login','AuthController@loginShow')->name('admin.login');
    Route::post('/login','AuthController@loginProcess')->name('admin.login');

    Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');

    Route::resource('/specialist', 'DoctorSpecialistController');
    // Route::get('/specialist/destroy/{id}', 'DoctorSpecialistController@destroy');

    // Route::get('/specialist', 'DoctorSpecialistController@index');

    // Route::get('/specialist/create', 'DoctorSpecialistController@create');
    // Route::post('/specialist/store', 'DoctorSpecialistController@store');
    // Route::post('/specialist/update', 'DoctorSpecialistController@update');

    Route::resource('/doctor', 'DoctorController');




});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
