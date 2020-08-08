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



Auth::routes();
//bebas akses
Route::group(['middleware' => ['auth','ceklevel:admin,dosen']], function(){
    Route::get('/', function () {
        return view('index');
    });
});
//akses admin
Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
    Route::get('/students', 'berandaController@mahasiswa')->name('mhs');
    Route::get('/lecturers', 'berandaController@dosen')->name('dsn');
    Route::get('/staffs', 'berandaController@baak')->name('baak');
    Route::get('/schedule', 'berandaController@jadwal')->name('jadwal');
    Route::get('/class', 'berandaController@kelas')->name('kelas');
    Route::get('/courses', 'berandaController@matkul')->name('matkul');
    Route::get('/presence', 'berandaController@presensi')->name('presensi');
    Route::get('/study-program', 'berandaController@prodi')->name('prodi');
    Route::get('/classroom', 'berandaController@ruang')->name('ruang');
});
//akses dosen
Route::group(['middleware' => ['auth','ceklevel:dosen']], function(){
    
});



