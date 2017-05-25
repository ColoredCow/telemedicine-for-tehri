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

Route::group(['middleware' => ['auth']], function () {

	Route::resource('doctor', 'DoctorController');
	Route::resource('pharmacy', 'PharmacyController');
	Route::resource('ambulance', 'AmbulanceController');
	Route::resource('prescription', 'PrescriptionController');
	Route::resource('patient', 'PatientController');

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/patient/getbynumber/{phone}', 'PatientController@getByNumber')->name('home');
	Route::get('/doctorsdashboard', 'DoctorController@dashboard');
	Route::get('/pharmacydashboard', 'PharmacyController@dashboard');

});

	Route::post('/setapptoken', 'Auth\LoginController@setAppToken');
	Route::post('/prescription/approval', 'PrescriptionController@approval');
	Route::get('/prescription/pharmacyapprove/{id}', 'PrescriptionController@pharmacyApproval');
	Route::get('/prescription/doctorapprove/{id}', 'PrescriptionController@doctorApproval');
	Route::get('/prescription/pharmacydecline/{id}', 'PrescriptionController@pharmacyDecline');
	Route::get('/prescription/doctordecline/{id}', 'PrescriptionController@doctorDecline');
	Route::get('/prescription/getbydoctor/{phone}', 'PrescriptionController@getByDoctor');
	Route::get('/prescription/getbypharmacy/{phone}', 'PrescriptionController@getByPharmacy');
