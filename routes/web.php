<?php


use App\Models\Strand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentAdmissionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrackController;

// Ensure the controller exists and is correctly referenced
Route::get('/Student_Admission', [StudentAdmissionController::class, 'index'])->name('route.student.admission');

Route::get('/Dashboard', [DashboardController::class, 'index'])->name('route.dashboard');

Route::get('/Register', [RegisterController::class, 'index'])->name('route.register');

Route::get('/Strand', [StrandController::class, 'index'])->name('route.strand');

Route::get('/Subject', [SubjectController::class, 'index'])->name('route.subject');

Route::get('/Track', [TrackController::class, 'index'])->name('route.track');
