<?php

use App\Models\Strand;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\StrandController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminLogInController;
use App\Http\Controllers\EnrolledStudentController;
use App\Http\Controllers\StudentAdmissionController;
use App\Http\Controllers\StudentLogInController;

// Ensure the controller exists and is correctly referenced




//tanan makita sa home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/About-Us', [HomeController::class, 'about'])->name('home.about');
Route::get('/Contact-Us', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/Programs', [HomeController::class, 'program'])->name('home.program');

Route::get('/Register', [RegisterController::class, 'index'])->name('route.register');
Route::post('/Register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/admin/login', [AdminLogInController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminLogInController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [AdminLogInController::class, 'logout'])->name('admin.logout');

Route::get('/student/login', [StudentLogInController::class, 'login'])->name('student.login');
Route::post('/student/login', [StudentLogInController::class, 'authenticate'])->name('student.authenticate');
Route::post('/student/logout', [StudentLogInController::class, 'logout'])->name('student.logout');





// Dashboard for summary analytics and the reports feature to be added
Route::get('/Dashboard', [DashboardController::class, 'index'])->name('route.dashboard'); //walay pulos?



//admin

Route::get('/Section', [SectionController::class, 'index'])->name('sections.index');
Route::get('/Section/create', [SectionController::class, 'create'])->name('sections.create');
Route::post('/Section', [SectionController::class, 'store'])->name('sections.store');
Route::get('/Section/{section}/edit', [SectionController::class, 'edit'])->name('sections.edit');
Route::put('/Section/{section}', [SectionController::class, 'update'])->name('sections.update');
Route::delete('/Section/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');

Route::get('/Schedule', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/Schedule/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/Schedule', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('/Schedule/{schedules}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('/Schedule/{schedules}', [TeacherController::class, 'update'])->name('schedules.update');
Route::delete('/Schedule/{schedules}', [TeacherController::class, 'destroy'])->name('schedules.destroy');
Route::get('/schedules/getSchedule/{sectionID}', [ScheduleController::class, 'getSchedule']);

// need to impri
Route::get('/Teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/Teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/Teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/Teachers/{teachers}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/Teachers/{teachers}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/Teachers/{teachers}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

//to be specified route 
Route::get('/Subject', [SubjectController::class, 'index'])->name('route.subject');
Route::resource('subjects', SubjectController::class);
Route::resource('strands', StrandController::class);
Route::resource('gradelevels', GradeController::class);
Route::resource('tracks', TrackController::class);


//this  route need to be continue
Route::get('/Student_Admission', [StudentAdmissionController::class, 'index'])->name('route.student.admission');
Route::get('/enrolled-students', [EnrolledStudentController::class, 'index'])->name('route.enrolled.student');
