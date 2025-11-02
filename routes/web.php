<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* -------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------*/
Route::view('/login', 'login')->name('login');

Route::post('/login', function () {
    // sementara redirect ke dashboard lecturer
    return redirect()->route('lecturer.index');
})->name('login.process');

Route::get('/login/myits', function () {
    return redirect()->route('lecturer.index');
})->name('login.myits');

/* ===== Lecturer Login (baru) ===== */
Route::get('/lecturer/login', function () {
    return view('lecturer.auth.login-lecturer');
})->name('lecturer.login');

Route::post('/lecturer/login', function () {
    // sementara: langsung masuk ke dashboard lecturer
    return redirect()->route('lecturer.dashboard');
})->name('lecturer.login.process');

Route::get('/lecturer/login/myits', function () {
    // sementara: langsung masuk ke dashboard lecturer
    return redirect()->route('lecturer.dashboard');
})->name('lecturer.login.myits');
/* ===== end Lecturer Login ===== */

/* ===== Student Login (baru) ===== */
Route::get('/student/login', function () {
    return view('student.auth.login-student');
})->name('student.login');

Route::post('/student/login', function () {
    // setelah login langsung ke dashboard student
    return redirect()->route('student.dashboard');
})->name('student.login.process');

Route::get('/student/login/myits', function () {
    // setelah login langsung ke dashboard student
    return redirect()->route('student.dashboard');
})->name('student.login.myits');
/* ===== end Student Login ===== */

/* -------------------------------------------------------------
| LECTURER SECTION
|--------------------------------------------------------------*/
Route::prefix('lecturer')->name('lecturer.')->group(function () {
    // Halaman “root” lecturer (kalau ada landing khusus)
    Route::view('/', 'lecturer.index')->name('index');

    // Dashboard lecturer
    Route::view('/dashboard', 'lecturer.dashboard.dashboard')->name('dashboard');
});

/* -------------------------------------------------------------
| DEFAULT / HOME
|--------------------------------------------------------------*/
Route::view('/', 'welcome')->name('home');