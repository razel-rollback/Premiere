<?php


use App\Models\Strand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\StrandController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentAdmissionController;

// Ensure the controller exists and is correctly referenced

//guest
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'about'])->name('home.about');


//idk
Route::get('/Student_Admission', [StudentAdmissionController::class, 'index'])->name('route.student.admission');

Route::get('/Dashboard', [DashboardController::class, 'index'])->name('route.dashboard');

Route::get('/Subject', [SubjectController::class, 'index'])->name('route.subject');


//admin

Route::resource('strands', StrandController::class);

Route::resource('gradelevels', GradeController::class);

Route::resource('tracks', TrackController::class);
