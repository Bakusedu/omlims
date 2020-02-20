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

Route::get('/home', function () {
    return view('welcome');
})->middleware('auth');
Route::get('/patient_add', function() {
    return view('layouts.nurses.record');
});
Route::get('/recieve', function() {
    return view('recieve');
});
Route::get('/new_staff', function() {
    return view('new_staff');
});
Route::post('/new_staff','StaffController@store');
Route::get('/vital_signs/{patient_id}','Auth\RegisterController@viewVitalSigns')->middleware('auth');
Route::get('/', function() {
    return view('login');
})->middleware('guest');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout')->middleware('auth');
Route::post('/add_patient','Auth\RegisterController@add_patient')->middleware('auth');
Route::post('/add_vitalsymptoms','Auth\RegisterController@takeVitalSigns')->middleware('auth');
Route::post('/search','SearchController@getPatientRecord')->middleware('auth');
Route::get('/view_staff','AdminController@view_staff')->middleware('auth');
Route::get('/add_staff','AdminController@add_staff')->middleware('auth');
Route::post('/add_staff','AdminController@register')->middleware('auth');
Route::get('/edit_staff/{id}','AdminController@edit')->middleware('auth');
Route::patch('/update_staff/{id}','AdminController@update')->middleware('auth');
Route::get('/delete_staff/{id}','AdminController@delete')->middleware('auth');
Route::get('/diagnose_patient','ClinicianController@diagnose_patient')->middleware('auth');
Route::get('/view_record/{id}','ClinicianController@view_record')->middleware('auth');
Route::patch('/symptoms/{id}','ClinicianController@symptoms')->middleware('auth');
Route::get('/send_test/{id}','ClinicianController@send_test')->middleware('auth');
Route::post('/send_test/{id}','ClinicianController@refer_lab')->middleware('auth');
Route::get('/conduct_test','LabController@conduct_test')->middleware('auth');
Route::get('/conduct_test/{id}','LabController@viewRefTest')->middleware('auth');
Route::get('/view_ref/{id}','LabController@viewRefTest')->middleware('auth');
Route::post('/submit_result/{id}','LabController@submit_result')->middleware('auth');
Route::get('/final_result','ClinicianController@final_result')->middleware('auth');
Route::get('/view_result/{id}','ClinicianController@view_result')->middleware('auth');
Route::get('/patients','AdminController@patients')->middleware('auth');
Route::post('/administer/{id}','ClinicianController@administer')->middleware('auth');
Route::get('/remove_patient/{id}','AdminController@remove_patient')->middleware('auth');
Route::get('/view_history/{id}','AdminController@view_history')->middleware('auth');
