<?php

use Illuminate\Support\Facades\Route;

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/mahasiswa', 'Auth\LoginController@showMahasiswaLoginForm');
Route::get('/register/mahasiswa', 'Auth\RegisterController@showMahasiswaRegisterForm');
Route::post('/login/mahasiswa', 'Auth\LoginController@MahasiswaLogin')->name('login.mahasiswa');;
Route::post('/register/mahasiswa', 'Auth\RegisterController@createMahasiswa');

Route::view('/home/mahasiswa', 'mahasiswa.home');
Route::resource('formulir_mhs', 'FormulirMahasiswaController');
Route::post('formulir_mhs/update-foto/{id}', 'FormulirMahasiswaController@editFoto');
Route::resource('lampiran_mhs', 'LampiranMahasiswaController');
Route::get('download/{file}', 'LampiranMahasiswaController@download');
Route::resource('akun_mahasiswa', 'AkunMahasiswaController');


Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('formulir', 'FormulirController');
Route::resource('lampiran', 'LampiranController');
Route::resource('akun_mhs', 'AkunMhsController');
Route::resource('akun', 'AkunController');
Route::post('edit_pass/{id}', 'AkunController@editPass');




Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

