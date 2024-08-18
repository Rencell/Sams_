<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\rfidController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\navigationController;

Route::get('/', function () {})->middleware('auth');
Route::get('/admin', function () {})->middleware('auth')->middleware('isAdmin');

Route::controller(loginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'store')->name('login.store');
    Route::delete('logout', 'destroy')->name('login.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [navigationController::class, 'Dashboard']);
    //Route::get('/student', [navigationController::class, 'Student']);
   
    //Route::get('/rfid', [navigationController::class, 'RFID']);
    Route::get('/setting', [navigationController::class, 'Setting']);
    //Route::get('/attendance', [navigationController::class, 'Attendance']);
});

Route::controller(adminController::class)->middleware('isAdmin')->group(function () {
    Route::get('admin/student', 'student');
    Route::get('admin/teacher', 'teacher');
    Route::get('admin/admins', 'admin');
});

// Teacher view

Route::controller(studentController::class)->middleware('auth')->group(function () {
    Route::get('student', 'index')->name('student.index');
    Route::post('student', 'store')->name('student.store');
    Route::put('student/{id}', 'update')->name('student.update');
    Route::delete('student/{id}', 'destroy')->name('student.destroy');
});


Route::controller(subjectController::class)->middleware('auth')->group(function () {
    Route::get('subject', 'index')->name('subject.index');
    Route::get('subject/{id}', 'manageStudent')->name('subject.manageStudent');
    Route::post('subject/{id}', 'storeStudent')->name('subject.studentstore');
    Route::post('subject', 'store')->name('subject.store');
    Route::put('student/{id}', 'update')->name('student.update');
    Route::delete('student/{id}', 'destroy')->name('student.destroy');
});

Route::controller(rfidController::class)->middleware('auth')->group(function(){
    Route::get('rfid', 'index')->name('rfid.index');
    Route::post('rfid', 'store')->name('rfid.store');
    Route::get('rfid-start/{subj_id}', 'create')->name('rfid.create');
});

Route::controller(attendanceController::class)->middleware('auth')->group(function(){
    
    Route::get('/attendance', 'index');
    Route::get('/attendance/{attendance_id}', 'manageSubject')->name('attendance.index');
    Route::post('rfid-start/{attendance_id}', 'store')->name('attendance.store');
});

