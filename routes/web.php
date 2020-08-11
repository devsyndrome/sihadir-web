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
Route::group(['middleware' => ['auth','ceklevel:admin,lecturer']], function(){
    Route::get('/', function () {
        return view('index');
    });
});
//akses admin
Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
    Route::resource('students', 'StudentsController');
    Route::resource('lecturers', 'LecturersController');
    Route::resource('staffs', 'StaffsController');
    Route::resource('schedules', 'SchedulesController');
    Route::resource('classes', 'ClassesController');
    Route::resource('courses', 'CoursesController');
    Route::resource('presences', 'PresencesController');
    Route::resource('study-programs', 'StudyProgramsController');
    Route::resource('classrooms', 'ClassroomsController');
});
//akses dosen
Route::group(['middleware' => ['auth','ceklevel:lecturer']], function(){
    
});





