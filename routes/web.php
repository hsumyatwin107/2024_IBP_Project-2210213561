<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);


//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[\App\Http\Controllers\HomeController::class,'redirect']);
//contact
Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact']);
//messages
Route::post('/user_message',[\App\Http\Controllers\HomeController::class,'user_message']);
//searching data
//search data
Route::get('/search_data',[\App\Http\Controllers\HomeController::class,'search_data']);

//admin
Route::get('/user_messages',[\App\Http\Controllers\AdminController::class,'user_messages']);
//user messages
Route::get('/user_messages',[\App\Http\Controllers\AdminController::class,'user_messages']);
//delete message
Route::get('/delete_message/{id}',[\App\Http\Controllers\AdminController::class,'delete_message']);
//users
Route::get('/users',[\App\Http\Controllers\AdminController::class,'users']);
//delete user
Route::get('/delete_user/{id}',[\App\Http\Controllers\AdminController::class,'delete_user']);
//updates
Route::post('/updates/{id}',[\App\Http\Controllers\AdminController::class,'updates']);
//category
Route::get('/category',[\App\Http\Controllers\AdminController::class,'category']);
//add category
Route::post('/add_category',[\App\Http\Controllers\AdminController::class,'add_category']);
//delete category
Route::get('/delete_category/{id}',[\App\Http\Controllers\AdminController::class,'delete_category']);

Route::get('/view_h_m',[\App\Http\Controllers\AdminController::class,'view_h_m']);
Route::post('/add_h_m',[\App\Http\Controllers\AdminController::class,'add_h_m']);
Route::get('/show_h_m',[\App\Http\Controllers\AdminController::class,'show_h_m']);
Route::get('/delete_section/{id}',[\App\Http\Controllers\AdminController::class,'delete_section']);
Route::get('/edit_h_m/{id}',[\App\Http\Controllers\AdminController::class,'edit_h_m']);
Route::post('/update_confirm/{id}',[\App\Http\Controllers\AdminController::class,'update_confirm']);



