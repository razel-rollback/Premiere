<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Models\Enrollment;
use App\Models\Subject;
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
use App\Http\Controllers\StudentLogInController;
use App\Http\Controllers\EnrolledStudentController;
use App\Http\Controllers\StudentAdmissionController;
use Illuminate\Http\Request;

// Ensure the controller exists and is correctly referenced

Route::get('/get-subjects', function (Request $request) {
    return Subject::where('strandID', $request->strand_id)->get();
});
Route::middleware('guest.user')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/About-Us', [HomeController::class, 'about'])->name('home.about');
    Route::get('/Contact-Us', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/Programs', [HomeController::class, 'program'])->name('home.program');

    Route::get('/Register', [RegisterController::class, 'index'])->name('route.register');
    Route::post('/Register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/admin/login', [AdminLogInController::class, 'login'])->name('admin.login1');
    Route::post('/admin/login', [AdminLogInController::class, 'authenticate'])->name('admin.authenticate');


    Route::get('/student/login', [StudentLogInController::class, 'login'])->name('student.login');
    Route::post('/student/login', [StudentLogInController::class, 'authenticate'])->name('student.authenticate');
});

Route::middleware(['auth.custom:student'])->group(function () {
    //
    Route::post('/student/logout', [StudentLogInController::class, 'logout'])->name('student.logout');
    Route::get('/student/profile', [StudentLogInController::class, 'showProfile'])->name('student.profile');
});

Route::middleware(['auth.custom:admin'])->group(function () {
    //
});
Route::post('/admin/logout', [AdminLogInController::class, 'logout'])->name('admin.logout');

// Dashboard for summary analytics and the reports feature to be added
Route::get('/Dashboard', [DashboardController::class, 'index'])->name('route.dashboard'); //walay pulos?

//admin
Route::get('/Section', [SectionController::class, 'index'])->name('sections.index');
Route::get('/Section/create', [SectionController::class, 'create'])->name('sections.create');
Route::post('/Section', [SectionController::class, 'store'])->name('sections.store');
Route::get('/Section/{section}/edit', [SectionController::class, 'edit'])->name('sections.edit');
Route::put('/Section/{section}', [SectionController::class, 'update'])->name('sections.update');
Route::delete('/Section/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');

// need to improve data?
Route::get('/Teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/Teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/Teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/Teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/Teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/Teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

//to be specified route 
Route::get('/Subject', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/Subject/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/Subject', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/Subject/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/Subject/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/Subject/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

Route::get('/Strand', [StrandController::class, 'index'])->name('strands.index');
Route::get('/Strand/create', [StrandController::class, 'create'])->name('strands.create');
Route::post('/Strand', [StrandController::class, 'store'])->name('strands.store');
Route::get('/Strand/{strand}/edit', [StrandController::class, 'edit'])->name('strands.edit');
Route::put('/Strand/{strand}', [StrandController::class, 'update'])->name('strands.update');
Route::delete('/Strand/{strand}', [StrandController::class, 'destroy'])->name('strands.destroy');

Route::get('/Grade-Level', [GradeController::class, 'index'])->name('gradelevels.index');
Route::get('/Grade-Level/create', [GradeController::class, 'create'])->name('gradelevels.create');
Route::post('/Grade-Level', [GradeController::class, 'store'])->name('gradelevels.store');
Route::get('/Grade-Level/{gradelevel}/edit', [GradeController::class, 'edit'])->name('gradelevels.edit');
Route::put('/Grade-Level/{gradelevel}', [GradeController::class, 'update'])->name('gradelevels.update');
Route::delete('/Grade-Level/{gradelevel}', [GradeController::class, 'destroy'])->name('gradelevels.destroy');


Route::get('/Track', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/Track/create', [TrackController::class, 'create'])->name('tracks.create');
Route::post('/Track', [TrackController::class, 'store'])->name('tracks.store');
Route::get('/Track/{tracks}/edit', [TrackController::class, 'edit'])->name('tracks.edit');
Route::put('/Track/{tracks}', [TrackController::class, 'update'])->name('tracks.update');
Route::delete('/Track/{tracks}', [TrackController::class, 'destroy'])->name('tracks.destroy');







//this  route need to be continue
Route::get('/Student_Admission', [StudentAdmissionController::class, 'index'])->name('route.student.admission');

Route::post('/Student_Admission/{register}/accept', [StudentAdmissionController::class, 'accept'])->name('route.student.admission.accept');
Route::post('Student_Admission/{register}/reject', [StudentAdmissionController::class, 'reject'])
    ->name('route.student.admission.reject');



// Enrolled Students
Route::get('/enrolled-students', [EnrolledStudentController::class, 'enrolledStudents'])
    ->name('enrolled.students');

// Unenroll Student
Route::delete('/enrollments/{enrollment}', [EnrolledStudentController::class, 'unenroll'])
    ->name('student.unenroll');



Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('schedule/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('schedule/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
