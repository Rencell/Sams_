<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\navigationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
})->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [navigationController::class, 'Dashboard']);
    //Route::get('/student', [navigationController::class, 'Student']);
    Route::get('/subject', [navigationController::class, 'Subject']);
    Route::get('/rfid', [navigationController::class, 'RFID']);
    Route::get('/setting', [navigationController::class, 'Setting']);
    Route::get('/attendance', [navigationController::class, 'Attendance']);
});


/* Route::controller(navigationController::class)->group(function () {
    Route::get('/dashboard', [navigationController::class, 'Dashboard']);

}); */
Route::controller(StudentController::class)->middleware('auth')->group(function () {
    Route::get('/student', 'index')->name('student.index');
    Route::post('/student', 'store')->name('student.store');
    Route::put('/student/{id}', 'update')->name('student.update');
    Route::delete('/student/{id}', 'destroy')->name('student.destroy');
});

Route::get('login', [loginController::class, 'index'])->name('login');
Route::post('login', [loginController::class, 'store'])->name('login.store');
Route::delete('logout', [loginController::class, 'destroy'])->name('login.destroy');

