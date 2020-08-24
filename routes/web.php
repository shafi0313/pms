<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
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
// Route::get('t', function () {
// //   return  Appointment::all();
//   return  Appointment::with('patientForApp')->get();
// });

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Backend')->group(function(){
    Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');

    Route::resource('/specialist', 'DoctorSpecialistController');
    Route::resource('/doctor', 'DoctorController');
    Route::get('admin/doctor/destroy/{id}', 'DoctorController@destroy');

    Route::get('/users', 'AdminUser@index')->name('admin.user');

    Route::resource('/medicine', 'MedicineController');
    Route::get('/medicine/destroy/{id}', 'MedicineController@destroy')->name('medicine.destroy');

    Route::resource('/patients', 'PatientController');
    Route::get('/patients/get/sub', 'PatientController@subCat')->name('subcat');
    Route::get('/patients/destroy/{id}', 'PatientController@destroy')->name('patients.destroy');

    Route::resource('/appointments', 'AppointmentController');
    Route::get('/appointment/patients', 'AppointmentController@patientList')->name('appointment.patient');
    Route::get('/appointment/patients/{id}', 'AppointmentController@patientSelect')->name('appointment.select.patient');
    Route::get('/appointment/show', 'AppointmentController@appointment')->name('appointment.show');
    Route::get('/patients/get/sub', 'AppointmentController@subCat')->name('subcat');
    Route::get('/appointments/destroy/{id}', 'AppointmentController@destroy')->name('appointments.destroy');





});

Route::get('/', function () {
    Alert::success('Success Title', 'Success Message');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
