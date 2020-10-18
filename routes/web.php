<?php

use App\Models\Appointment;
use App\User;
use App\Models\PatientTest;
use App\Models\Prescription;
use App\Models\SpecialistSubCat;
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
//   return  SpecialistSubCat::all();
  return  User::with('doctorDegree')->get();
});

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Backend')->group(function(){
    Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');
    Route::get('/visitor_info','DashboardController@VisitorInfo')->name('VisitorInfo');

    // Route::resource('/specialist', 'DoctorSpecialistController');
    Route::resource('/specialist', 'SpecialistCatController');
    Route::resource('/doctor', 'DoctorController');
    Route::get('admin/doctor/destroy/{id}', 'DoctorController@destroy');

    Route::resource('/users', 'AdminUser');
    Route::get('/users/destroy/{id}', 'AdminUser@destroy')->name('users.destroy');

    Route::resource('/medicine', 'MedicineController');
    Route::get('/medicine/destroy/{id}', 'MedicineController@destroy')->name('medicine.destroy');

    Route::resource('/patients', 'PatientController');
    Route::get('/patients/get/sub', 'PatientController@subCat')->name('patients.doctorSpecialist');
    Route::get('/patients/destroy/{id}', 'PatientController@destroy')->name('patients.destroy');

    Route::resource('/medical_test','MedicalTestController');


    Route::resource('/doctor_chamber','DoctorChamberController');


    Route::resource('/appointments', 'AppointmentController');
    Route::get('/appointment/patients', 'AppointmentController@patientList')->name('appointment.patient');
    Route::get('/appointment/create/{id}', 'AppointmentController@create')->name('appointmentCreate');
    Route::get('/appointment/show', 'AppointmentController@appointment')->name('appointment.show');
    Route::get('/appointment/get/sub', 'AppointmentController@subCat')->name('appointment.doctorSpecialist');
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
    Route::get('prescriptions/appointment', 'PrescriptionController@appointmentShow')->name('prescription.appointment');
    Route::get('prescriptions/{id}', 'PrescriptionController@prescriptionCreate')->name('prescriptionCreate');
    Route::post('prescriptions/{id}', 'PrescriptionController@store')->name('prescriptionCreate');
    Route::get('presscriptions/date/{patient_id}', 'PrescriptionController@prescriptionDates')->name('prescriptionDates');
    Route::get('presscriptions/prescription/show/{date}/{apnmt_id}', 'PrescriptionController@prescriptionShow')->name('prescriptionShow');

    Route::get('autocomplete', 'PrescriptionController@autocomplete')->name('autocomplete');
    Route::get('searchajax', ['as'=>'searchajax','uses'=>'PrescriptionController@searchResponse']);

});

Route::get('/', function () {
    // $ip = geoip()->getClientIP();
    // $geoInfo = geoip()->getLocation($ip);
    // dd($geoInfo);
    // Alert::success('Success Title', 'Success Message');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
