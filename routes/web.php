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


// Route::group(['middleware'=>'teacher'], function() {
//     Route::get('/teacher/home', 'Teacher\HomeController@index');
// });

Route::prefix('admin')->namespace('Backend')->group(function(){
    Route::resource('/users', 'AuthController');

    // Route::get('/get/users','AuthController@getUser')->name('get.user');
    // Route::post('/users/store','AuthController@registerStore')->name('admin.registerStore');

    Route::get('/login','AuthController@loginShow')->name('admin.login');
    Route::post('/login','AuthController@login')->name('admin.login.post');
    Route::get('/logout','AuthController@logout')->name('adminLogout');
    // Route::get('/logout','AuthController@logout')->name('admin.logout');


    Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');

    Route::resource('/specialist', 'DoctorSpecialistController');

    Route::resource('/doctor', 'DoctorController');
    Route::get('admin/doctor/destroy/{id}', 'DoctorController@destroy');




});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
