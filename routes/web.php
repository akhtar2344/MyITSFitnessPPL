<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturerController;

Route::get('/lecturer/students/dummy', [LecturerController::class, 'showDummy'])
    ->name('lecturer.show.dummy');

Route::get('/lecturer/students/{id?}', [LecturerController::class, 'show'])
    ->name('lecturer.show');

