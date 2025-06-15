<?php

use App\Models\ContactMessages;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;

Route::get('/contact', [MessageController::class, 'showContactForm']);
Route::post('/user_message', [MessageController::class, 'store']);

// Notice Route
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Verification Route
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marks the user as verified
    return redirect('/'); 
})->middleware(['auth', 'signed'])->name('verification.verify');

//Resend Email Route
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
 // Home + Redirect + Contact
Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/user_message', [HomeController::class, 'user_message']);
Route::get('/search_data', [HomeController::class, 'search_data']);

// Language Switch
// Route::get('/lang/{locale}', function ($locale) {
//     if (in_array($locale, ['en', 'ar', 'tr'])) {
//         App::setLocale($locale);
//         session(['locale' => $locale]);
//     }
//     return redirect()->back();
// });

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar', 'tr'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});

// Dashboard (Jetstream)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

// STUDENT Routes
Route::get('/student', [StudentController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('student.home');
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
// Route::post(uri: '/reply_message/{id}', [AdminController::class, 'reply_Message']);

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

// Category Management
Route::get('/category', [AdminController::class, 'category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::resource('category', AdminController::class);
// Section Management
Route::get('/view_h_m', [AdminController::class, 'view_h_m']);
Route::get('/add_h_m', [AdminController::class, 'add_h_m']);
Route::post('/add_h_m', [AdminController::class, 'add_h_m']);
Route::get('/show_h_m', [AdminController::class, 'show_h_m']);
Route::get('/delete_section/{id}', [AdminController::class, 'delete_section']);
Route::get('/edit_h_m/{id}', [AdminController::class, 'edit_h_m']);
Route::post('/update_confirm/{id}', [AdminController::class, 'update_confirm']);
