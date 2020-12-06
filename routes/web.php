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
    return view('auth.login');
});

Auth::routes();

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
   })->name("register");

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
Route::resource('kriteria', 'KriteriaController');
Route::resource('kandidat', 'KandidatController');
Route::get('/nilai', 'NilaiController@index')->name('nilai');
Route::get('/niai/{id}', 'NilaiController@create')->name('nilai.tambah');
Route::post('/nilai/{id}', 'NilaiController@store')->name('nilai.simpan');
Route::get('/nilai/edit/{id}', 'NilaiController@edit')->name('nilai.edit');
Route::post('/nilai/edit/{id}', 'NilaiController@update')->name('nilai.update');
Route::get('/perhitungan/list', 'PerhitunganController@list_data');
Route::get('/perhitungan/calculate', 'PerhitunganController@calculate');
Route::get('/laporan/spkwp', 'LaporanController@karyawanterbaik');
