<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;

use App\Http\Controllers\Teacher\rfidController;
use App\Http\Controllers\Teacher\adminController;
use App\Http\Controllers\Teacher\profileController;
use App\Http\Controllers\Teacher\studentController;
use App\Http\Controllers\Teacher\subjectController;
use App\Http\Controllers\Teacher\attendanceController;
use App\Http\Controllers\Teacher\dashboardController;
use App\Http\Controllers\admin\admin_studentController;
use App\Http\Controllers\admin\admin_teacherController;
use App\Http\Controllers\admin\admin_adminController;

Route::get('/', function () {
    return view('index');
});
Route::get('/admin', function () {})->middleware('auth')->middleware('isAdmin');

Route::controller(loginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'store')->name('login.store');
    Route::delete('logout', 'destroy')->name('login.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index']);
});



Route::controller(studentController::class)->middleware('auth')->group(function () {
    Route::get('student', 'index')->name('student.index');
    Route::post('student', 'store')->name('student.store');
    Route::put('student/{id}', 'update')->name('student.update');
    Route::delete('student/{id}', 'destroy')->name('student.destroy');
});


Route::controller(subjectController::class)->middleware('auth')->group(function () {
    Route::get('subject', 'index')->name('subject.index');
    Route::get('subject/{id}', 'show')->name('subject.manageStudent');
    Route::post('subject/archive', 'archive')->name('subject.archive');
    Route::post('subject/{id}', 'storeStudent')->name('subject.studentstore');
    Route::post('subject', 'store')->name('subject.store');
    Route::put('subject/{id}', 'update')->name('subject.update');
    Route::delete('subject/{id}', 'destroy')->name('subject.destroy');
    Route::delete('subject/deleteStudent/{subj_id}/{stud_id}', 'deleteStudent')->name('subject.deleteStudent');
    
    
});

Route::controller(rfidController::class)->middleware('auth')->group(function(){
    Route::get('rfid', 'index')->name('rfid.index');
    Route::post('rfid', 'store')->name('rfid.store');
    Route::get('rfid-start/{subj_id}', 'create')->name('rfid.create');
});

Route::controller(attendanceController::class)->middleware('auth')->group(function(){
    
    Route::get('/attendance', 'index');
    Route::post('/attendance/archive', 'archive')->name('attendance.archive');
    Route::get('/attendance/{attendance_id}', 'manageSubject')->name('attendance.index');
    Route::post('rfid-start/{attendance_id}', 'store')->name('attendance.store');

    Route::post('Attendance/{attendance_id}/{student_id}', 'restoreAbsent')->name('attendance.restoreAbsent');
    Route::delete('attendance/{subj_id}/{stud_id}', 'destroy')->name('attendance.destroystudent');
    Route::delete('attendance/{attendance_id}', 'destroyAttendance')->name('attendance.destroyAttendance');
});
Route::controller(profileController::class)->middleware('auth')->group(function(){
    
    Route::get('/profile', 'index');
    Route::post('/profile', 'update')->name('profile.updateProfile');
    Route::post('/profile/password', 'updatePass')->name('profile.updatePassword');
   
});


Route::prefix('admin')->namespace('App\Http\Controllers\admin')->middleware('isAdmin')->group(function () {

    Route::controller(admin_studentController::class)->group(function () {
        Route::get('student', 'index');
        Route::post('student/archive', 'archive')->name('student-admin.archive');
    });

    Route::controller(admin_teacherController::class)->group(function () {
        Route::get('teacher', 'index');
        Route::post('teacher', 'store')->name('admin-teacher.store');
        Route::put('teacher/update/{id}', 'update')->name('admin-teacher.update');
        Route::delete('teacher/destroy/{user_id}', 'destroy')->name('admin-teacher.destroy');
        Route::post('teacher/archive', 'archive')->name('admin-teacher.archive');
    });

    Route::controller(admin_adminController::class)->group(function () {
        Route::get('admins', 'index');
        Route::post('admins/create', 'store')->name('admin.store');
        Route::put('admins/update/{id}', 'update')->name('admin.update');
        Route::delete('admins/destroy/{admin_id}', 'destroy')->name('admin.destroy');
        Route::post('admins/archive', 'archive')->name('admin.archive');
    });
});
