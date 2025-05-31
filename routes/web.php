<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\ScholarshipController; // Import the ScholarshipController
use App\Http\Controllers\ApplicationController; // Import the ApplicationController
use App\Http\Controllers\StudentController; // Import the StudentController
use App\Http\Controllers\AdminController; // Import the AdminController

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/applications', [AdminController::class, 'viewApplications'])->name('admin.applications');

Route::get('/student/applications', [StudentController::class, 'myApplications'])->name('student.applications');

Route::get('/student', [StudentController::class, 'index'])->name('student.home');
Route::get('/scholarships', [StudentController::class, 'showScholarships'])->name('student.scholarships');
Route::get('/scholarships/apply/{id}', [StudentController::class, 'applyForm'])->name('student.apply.form');
Route::post('/scholarships/apply', [StudentController::class, 'submitApplication'])->name('student.apply.submit');
Route::get('/student/scholarships', [StudentController::class, 'index'])->name('student.scholarships');
Route::get('/admin', [AdminController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
    Route::post('/scholarships/{id}/apply', [ScholarshipController::class, 'apply'])->name('scholarships.apply');
});

Route::resource('application', ApplicationController::class);

Route::patch('/application/{application}/update-status', [ApplicationController::class, 'updateStatus'])->name('application.updateStatus');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('scholarships', ScholarshipController::class);
});
Route::resource('scholarship', ScholarshipController::class);


// Language Switch Route
Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'tr', 'ar'])) {
        App::setLocale($lang);
        session(['locale' => $lang]); // Store the language in session
    }
    return redirect()->back();
})->name('lang.switch');

// Home Route
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

// Authentication & Dashboard Route (Using Jetstream Middleware)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Redirect Route
Route::get('/redirect', [\App\Http\Controllers\HomeController::class, 'redirect']);

// Contact Page
Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'contact']);
Route::post('/user_message', [\App\Http\Controllers\HomeController::class, 'user_message']);

// Search Data
Route::get('/search_data', [\App\Http\Controllers\HomeController::class, 'search_data']);

// Admin Routes
Route::get('/user_messages', [\App\Http\Controllers\AdminController::class, 'user_messages']);
Route::get('/delete_message/{id}', [\App\Http\Controllers\AdminController::class, 'delete_message']);

// User Management
Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users']);
Route::get('/delete_user/{id}', [\App\Http\Controllers\AdminController::class, 'delete_user']);
Route::post('/updates/{id}', [\App\Http\Controllers\AdminController::class, 'updates']);

// Category Management
Route::get('/category', [\App\Http\Controllers\AdminController::class, 'category']);
Route::post('/add_category', [\App\Http\Controllers\AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [\App\Http\Controllers\AdminController::class, 'delete_category']);

// Section Management
Route::get('/view_h_m', [\App\Http\Controllers\AdminController::class, 'view_h_m']);
Route::post('/add_h_m', [\App\Http\Controllers\AdminController::class, 'add_h_m']);
Route::get('/show_h_m', [\App\Http\Controllers\AdminController::class, 'show_h_m']);
Route::get('/delete_section/{id}', [\App\Http\Controllers\AdminController::class, 'delete_section']);
Route::get('/edit_h_m/{id}', [\App\Http\Controllers\AdminController::class, 'edit_h_m']);
Route::post('/update_confirm/{id}', [\App\Http\Controllers\AdminController::class, 'update_confirm']);
