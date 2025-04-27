<?php

use App\Http\Controllers\AdminLogInController;
use App\Models\Strand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\StrandController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrolledStudentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentAdmissionController;
use App\Models\Enrollment;

// Ensure the controller exists and is correctly referenced

//tanan makita sa home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/About-Us', [HomeController::class, 'about'])->name('home.about');
Route::get('/register', [RegisterController::class, 'index'])->name('route.register');

//makita sa register (next)
Route::get('/register/guardian', [RegisterController::class, 'guardian'])->name('route.register-guardian'); //
Route::get('/Dashboard', [DashboardController::class, 'index'])->name('route.dashboard'); //walay pulos?


Route::get('/Subject', [SubjectController::class, 'index'])->name('route.subject');


//admin

Route::resource('subjects', SubjectController::class);
Route::resource('strands', StrandController::class);
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::resource('gradelevels', GradeController::class);
Route::resource('sections', SectionController::class);
Route::resource('tracks', TrackController::class);

Route::get('/Student_Admission', [StudentAdmissionController::class, 'index'])->name('route.student.admission');
Route::get('/enrolled-students', [EnrolledStudentController::class, 'index'])->name('route.enrolled.student');
Route::get('/admin/login', [AdminLogInController::class, 'login'])->name('route.admin.login');
