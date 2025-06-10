<?php

use App\Models\ContactMessages;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;

Route::get('/contact', [MessageController::class, 'showContactForm']);
Route::post('/user_message', [MessageController::class, 'store']);

// Home + Redirect + Contact
Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/user_message', [HomeController::class, 'user_message']);
Route::get('/search_data', [HomeController::class, 'search_data']);

// Language Switch
Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'tr', 'ar'])) {
        App::setLocale($lang);
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('lang.switch');

// Dashboard (Jetstream)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

// STUDENT Routes
Route::get('/student', [StudentController::class, 'index'])->name('student.home');
Route::resource('messages', MessageController::class);

Route::get('/message', [MessageController::class, 'index'])->name('student.message');
Route::get('/student/applications', [ApplicationController::class, 'myApplications'])->name('student.application');
Route::get('/student/applications/{application}', [ApplicationController::class, 'show'])->name('student.application.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/student/scholarships', [StudentController::class, 'showScholarships'])->name('student.scholarships');
});
// Route::get('/student/scholarships', [ScholarshipController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::post('/student/scholarships/apply/{id}', [ApplyController::class, 'apply'])->name('student.apply');
    // Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('student.scholarship');
    Route::post('/scholarships/{id}/apply', [ScholarshipController::class, 'apply'])->name('scholarship.apply');
});


Route::post('/scholarships/apply', [StudentController::class, 'submitApplication'])->name('student.apply.submit');

// ADMIN Routes
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/applications', [AdminController::class, 'viewApplications'])->name('admin.applications');

Route::get('/user_messages', [AdminController::class, 'user_messages']);
Route::get('/delete_message/{id}', [AdminController::class, 'delete_message']);
Route::post('/reply_message/{id}', [AdminController::class, 'reply_Message']);

Route::get('/users', [AdminController::class, 'users']);
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);
Route::post('/updates/{id}', [AdminController::class, 'updates']);

// APPLICATION Routes
Route::resource('application', ApplicationController::class);
Route::patch('/application/{application}/update-status', [ApplicationController::class, 'updateStatus'])->name('application.updateStatus');

// SCHOLARSHIP Routes
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('scholarships', ScholarshipController::class);
// });

Route::resource('scholarship', ScholarshipController::class); 


Route::middleware(['auth', 'student'])->group(function () {
    Route::resource('scholarships', StudentController::class);

    Route::get('/scholarships', [StudentController::class, 'showForStudents'])->name('student.scholarships');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/about-section', [AdminController::class, 'showAboutForm']);
    Route::post('/admin/about-section', [AdminController::class, 'updateAboutSection'])->name('admin.about.update');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/scholarship-news', [AdminController::class, 'showScholarshipForm'])->name('admin.scholarship.form');
    Route::post('/admin/scholarship-news/update', [AdminController::class, 'updateScholarship'])->name('admin.scholarship.update');    
});
