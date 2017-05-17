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
    return redirect('/login');
});


Route::get('/doctor/', function () {
    return view('doctors.index');
});

Route::get('/pharmacy/', function () {
    return view('pharmacys.index');
});

Route::get('/ambulance/', function () {
    return view('ambulances.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
