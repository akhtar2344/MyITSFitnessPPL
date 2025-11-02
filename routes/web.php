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

// List students -> resources/views/lecturer/index.blade.php
    Route::get('/students', function () {
        return view('lecturer.index');
    })->name('students.index');

// Detail student -> resources/views/lecturer/show.blade.php
    Route::get('/students/{nrp}', function (string $nrp) {
        // Jika show.blade.php kamu masih static, ini tetap aman.
        // Kalau nanti mau dinamis, tinggal lempar data di sini.
        return view('lecturer.show', compact('nrp'));
    })->whereNumber('nrp')->name('students.show');