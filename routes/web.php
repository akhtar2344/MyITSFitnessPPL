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
| STUDENT DASHBOARD (didefinisikan lebih awal)
|--------------------------------------------------------------*/
Route::view('/student/dashboard', 'student.dashboard.dashboard')->name('student.dashboard');

/* -------------------------------------------------------------
| STUDENT SECTION (Search/List + detail dummy)
|--------------------------------------------------------------*/
Route::prefix('student')->name('student.')->group(function () {
    // Halaman student index diarahkan ke dashboard student
    Route::redirect('/', '/student/dashboard')->name('index');

    // ===== Status Page =====
    Route::view('/status', 'student.status-page')->name('status');

    // ===== Submit Page =====
    Route::view('/submit', 'student.submit')->name('submit');

    // ===== Activity Details (mock Harry) =====
    Route::view('/activity/harry/pending', 'student.activity.show-pending')->name('activity.show.pending');
    Route::view('/activity/harry/accepted', 'student.activity.show-accepted')->name('activity.show.accepted');
    Route::view('/activity/harry/need-revision', 'student.activity.show-need-revision')->name('activity.show.needrevision');

    // ===== Edit & Re-submit form (student) =====
    Route::view('/activity/harry/edit', 'student.activity.edit-resubmit')->name('activity.edit');

    // ===== Resubmit handler (dummy) =====
    Route::post('/activity/harry/resubmit', function () {
        // real app: validasi + simpan file + update status → "Pending"
        // mock: redirect ke detail pending + set flash 'resubmitted' untuk trigger popup "revision-complete.png"
        return redirect()
            ->route('student.activity.show.pending')
            ->with('resubmitted', true);
    })->name('activity.resubmit');

    // Optional previews existing
    Route::get('/show', function () {
        $student = ['name' => 'Benedict', 'program' => 'Biologi', 'status' => 'Accepted'];
        $id = '5026231006';
        return view('student.show', compact('student', 'id'));
    })->name('show.test');

    Route::get('/submissions/edit', [ShowController::class, 'edit'])->name('submissions.edit');

    Route::get('/{id}', [ShowController::class, 'show'])
        ->whereNumber('id')
        ->name('show');
});

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
