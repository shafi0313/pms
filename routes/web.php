<?php

use App\User;
use App\Models\PatientTest;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
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
Route::get('t', function () {
//   return  Appointment::all();
//   return  PatientTest::all();
  return  PatientTest::with('doctor')->get();
});

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Backend')->group(function(){
    Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');

    Route::resource('/specialist', 'DoctorSpecialistController');
    Route::resource('/doctor', 'DoctorController');
    Route::get('admin/doctor/destroy/{id}', 'DoctorController@destroy');

    Route::resource('/users', 'AdminUser');
    Route::get('/users/destroy/{id}', 'AdminUser@destroy')->name('users.destroy');

    Route::resource('/medicine', 'MedicineController');
    Route::get('/medicine/destroy/{id}', 'MedicineController@destroy')->name('medicine.destroy');

    Route::resource('/patients', 'PatientController');
    Route::get('/patients/get/sub', 'PatientController@subCat')->name('subcat');
    Route::get('/patients/destroy/{id}', 'PatientController@destroy')->name('patients.destroy');

    Route::resource('/medical_test','MedicalTestController');


    Route::resource('/appointments', 'AppointmentController');
    Route::get('/appointment/patients', 'AppointmentController@patientList')->name('appointment.patient');
    Route::get('/appointment/create/{id}', 'AppointmentController@create')->name('appointmentCreate');
    Route::get('/appointment/show', 'AppointmentController@appointment')->name('appointment.show');
    Route::get('/patients/get/sub', 'AppointmentController@subCat')->name('subcat');
    Route::get('/appointments/destroy/{id}', 'AppointmentController@destroy')->name('appointments.destroy');


    Route::resource('patient_test', 'PatientTestController');
    Route::get('patient_test_appointment', 'PatientTestController@appointmentShow')->name('patient_test.appointment');
    Route::get('patient/{id}', 'PatientTestController@patientTestCreate')->name('patientTestCreate');
    Route::get('patient_tests/date/{patient_id}', 'PatientTestController@testDate')->name('patientTestDate');
    Route::get('patient/prescription/show/{date}', 'PatientTestController@testShow')->name('patientTestShow');
    // Route::get('autocomplete', 'PatientTestController@autocomplete')->name('patientautocomplete');
    // Route::get('search','PatientTestController@search')->name('medicaltests');

    Route::get('autocomplete', 'PatientTestController@autocomplete')->name('autocomplete');
    Route::get('patientsearch', ['as'=>'patientsearch','uses'=>'PatientTestController@patientsearch']);


    Route::resource('prescription', 'PrescriptionController');
    Route::get('prescription/appointment', 'PrescriptionController@appointmentShow')->name('prescription.appointment');
    Route::get('prescription/{id}', 'PrescriptionController@prescriptionCreate')->name('prescriptionCreate');
    Route::post('prescription/{id}', 'PrescriptionController@store')->name('prescriptionCreate');
    Route::get('presscription/date/{patient_id}', 'PrescriptionController@prescriptionDates')->name('prescriptionDates');
    Route::get('presscription/prescription/show/{date}/{apnmt_id}', 'PrescriptionController@prescriptionShow')->name('prescriptionShow');

    Route::get('autocomplete', 'PrescriptionController@autocomplete')->name('autocomplete');
    Route::get('searchajax', ['as'=>'searchajax','uses'=>'PrescriptionController@searchResponse']);

});

Route::get('/', function () {
    // Alert::success('Success Title', 'Success Message');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
