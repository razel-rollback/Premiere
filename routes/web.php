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
use App\Http\Controllers\RegisterController;


// Ensure the controller exists and is correctly referenced

//tanan makita sa home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/register', [RegisterController::class, 'index'])->name('route.register');

//makita sa register (next)
Route::get('/register/guardian', [RegisterController::class, 'guardian'])->name('route.register-guardian'); //
Route::get('/Dashboard', [DashboardController::class, 'index'])->name('route.dashboard'); //walay pulos?

Route::get('/Strand', [StrandController::class, 'index'])->name('route.strand');

Route::get('/Subject', [SubjectController::class, 'index'])->name('route.subject');


//admin

Route::resource('strands', StrandController::class);

Route::resource('gradelevels', GradeController::class);

Route::resource('tracks', TrackController::class);

Route::get('/Student_Admission', [StudentAdmissionController::class, 'index'])->name('route.student.admission');
