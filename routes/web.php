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
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentAdmissionController;
use App\Models\Enrollment;

// Ensure the controller exists and is correctly referenced

//tanan makita sa home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/About-Us', [HomeController::class, 'about'])->name('home.about');
Route::get('/register', [RegisterController::class, 'index'])->name('route.register');

//makita sa register (next)
Route::get('/register/guardian', [RegisterController::class, 'guardian'])->name('route.register-guardian'); //
Route::get('/Dashboard', [DashboardController::class, 'index'])->name('route.dashboard'); //walay pulos?


Route::get('/Subject', [SubjectController::class, 'index'])->name('route.subject');


//admin

Route::get('/Section', [SectionController::class, 'index'])->name('sections.index');
Route::get('/Section/create', [SectionController::class, 'create'])->name('sections.create');
Route::post('/Section', [SectionController::class, 'store'])->name('sections.store');
Route::get('/Section/{section}/edit', [SectionController::class, 'edit'])->name('sections.edit');
Route::put('/Section/{section}', [SectionController::class, 'update'])->name('sections.update');
Route::delete('/Section/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');

Route::get('/Teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/Teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/Teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/Teachers/{teachers}/edit', [ScheduleController::class, 'edit'])->name('teachers.edit');
Route::put('/Teachers/{teachers}', [ScheduleController::class, 'update'])->name('teachers.update');
Route::delete('/Teachers/{teachers}', [ScheduleController::class, 'destroy'])->name('teachers.destroy');


Route::get('/Schedule', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/Schedule/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/Schedule', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('/Schedule/{schedules}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('/Schedule/{schedules}', [TeacherController::class, 'update'])->name('schedules.update');
Route::delete('/Schedule/{schedules}', [TeacherController::class, 'destroy'])->name('schedules.destroy');
Route::get('/api/section-schedules/{sectionID}', [ScheduleController::class, 'getSectionSchedules']);



Route::resource('subjects', SubjectController::class);
Route::resource('strands', StrandController::class);

Route::resource('gradelevels', GradeController::class);
Route::resource('tracks', TrackController::class);

Route::get('/Student_Admission', [StudentAdmissionController::class, 'index'])->name('route.student.admission');
Route::get('/enrolled-students', [EnrolledStudentController::class, 'index'])->name('route.enrolled.student');
Route::get('/admin/login', [AdminLogInController::class, 'login'])->name('route.admin.login');
