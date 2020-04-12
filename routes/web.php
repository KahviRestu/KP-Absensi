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

//Auth
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/absen','AbsenController@index');
    Route::get('/absen','AbsenController@index')->name('absen.index');;
    Route::post('/absen/guru', 'AbsenController@absenGuru');
    Route::post('/absen/postabsen', 'AbsenController@absen');
    Route::get('/absen/cari', 'AbsenController@search')->name('absen.search');
    Route::get('/absen/excel-users', 'AbsenController@excelUsers')->name('absen.excel-users');
    Route::get('/guru', 'GuruController@index');
    Route::post('/guru/create','GuruController@create');
    Route::post('/guru/update','GuruController@update');
    Route::get('/guru/hapus/{id}','GuruController@hapus');
    Route::get('/guru/absen','GuruController@absen');
    Route::post('/guru/createabsen','GuruController@pabsen');
    Route::get('/profile', 'GuruController@profile');
    Route::get('/dashboard', 'GuruController@dashboard');
    Route::get('/surat', 'SuratController@index');
    Route::post('/surat/create', 'SuratController@createSurat');
    Route::get('/approvel', 'SuratController@approvel');
    Route::get('/approvel/{id}/setuju', 'SuratController@setuju');
    Route::get('/approvel/{id}/tolak', 'SuratController@tolak');    
    Route::get('/ganti-password', 'UsersController@gantiPassword')->name('ganti-password');
    Route::patch('/update-password/{user}', 'UsersController@updatePassword')->name('update-password');
    Route::get('/profil', 'UsersController@profil')->name('profil');
    Route::patch('/update-profil/{user}', 'UsersController@updateProfil')->name('update-profil');

    Route::get('absen/cetak_pdf','AbsenController@cetakpdf');
});


