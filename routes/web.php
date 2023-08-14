<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin-login', [App\Http\Controllers\adminController::class, 'adminLogin'])->name('admin-login');
Route::post('admin-login', [App\Http\Controllers\adminController::class, 'loginSubmit'])->name('admin-login');

Route::middleware('auth:admin')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\adminController::class, 'dashboard'])->name('dashboard');
    Route::get('users', [App\Http\Controllers\adminController::class, 'allUsers'])->name('users');
    Route::get('dashboard1', [App\Http\Controllers\adminController::class, 'dashboard1'])->name('dashboard1');
    Route::get('dashboard2', [App\Http\Controllers\adminController::class, 'dashboard2'])->name('dashboard2');
    Route::get('dashboard3', [App\Http\Controllers\adminController::class, 'dashboard3'])->name('dashboard3');
    Route::get('dashboard4', [App\Http\Controllers\adminController::class, 'dashboard4'])->name('dashboard4');
    Route::get('dashboard5', [App\Http\Controllers\adminController::class, 'dashboard5'])->name('dashboard5');
    Route::get('dashboard6', [App\Http\Controllers\adminController::class, 'dashboard6'])->name('dashboard6');
    Route::get('admin-logout', [App\Http\Controllers\adminController::class, 'logout'])->name('admin-logout');
    //Route
    Route::get('routes/index', [App\Http\Controllers\routeController::class, 'index'])->name('routes/index');
    Route::get('routes/create', [App\Http\Controllers\routeController::class, 'create'])->name('routes/create');
    Route::post('routes/create', [App\Http\Controllers\routeController::class, 'create'])->name('routes/create');
    
    //property categories
    Route::get('property/index', [App\Http\Controllers\categoryController::class, 'index'])->name('property/categories');
    Route::get('property/create', [App\Http\Controllers\categoryController::class, 'create'])->name('property/create');
    Route::post('property/create', [App\Http\Controllers\categoryController::class, 'create'])->name('property/create');
    Route::get('routes/delete/{id}', [App\Http\Controllers\routeController::class, 'delete'])->name('routes/delete');
    //User
    Route::get('users/create', [App\Http\Controllers\userController::class, 'create'])->name('users/create');
    Route::post('users/create', [App\Http\Controllers\userController::class, 'create'])->name('users/create');

});

// Forgot Password
Route::get('forgot-password', [adminController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [adminController::class, 'forgotPasswordSubmit'])->name('forgot-password');
Route::get('reset-password/{token}', [adminController::class, 'resetPassword'])->name('reset-password/{token}');
Route::post('reset-password/{id}', [adminController::class, 'upatePassword'])->name('reset-password');


