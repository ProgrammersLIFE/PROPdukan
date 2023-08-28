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
    Route::get('routes/delete/{id}', [App\Http\Controllers\routeController::class, 'delete'])->name('routes/delete');
    
    //property categories
    Route::get('property/index', [App\Http\Controllers\categoryController::class, 'index'])->name('property/categories');
    Route::get('property/create', [App\Http\Controllers\categoryController::class, 'create'])->name('property/create');
    Route::post('property/create', [App\Http\Controllers\categoryController::class, 'create'])->name('property/create');
    Route::get('property/delete/{id}', [App\Http\Controllers\categoryController::class, 'delete'])->name('property/delete/{id}');
    Route::get('routes/delete/{id}', [App\Http\Controllers\routeController::class, 'delete'])->name('routes/delete');
    //properties
    Route::get('properties/index', [App\Http\Controllers\propertiesController::class, 'index'])->name('properties/create');
    Route::get('properties/create', [App\Http\Controllers\propertiesController::class, 'create'])->name('properties/create');
    Route::post('properties/create', [App\Http\Controllers\propertiesController::class, 'create'])->name('properties/create');
    Route::get('properties/delete/{id}', [App\Http\Controllers\propertiesController::class, 'delete'])->name('properties/delete/{id}');
    Route::get('properties/ptype',[App\Http\Controllers\propertiesController::class, 'get'])->name('properties/ptype');

    //kind..
    Route::get('kind/index', [App\Http\Controllers\kindController::class, 'index'])->name('kind/index');
    Route::get('kind/create', [App\Http\Controllers\kindController::class, 'create'])->name('kind/create');
    Route::post('kind/create', [App\Http\Controllers\kindController::class, 'create'])->name('kind/create');
    Route::get('kind/delete/{id}', [App\Http\Controllers\kindController::class, 'delete'])->name('kind/delete/{id}');

    //User
    Route::get('users/index', [App\Http\Controllers\userController::class, 'index'])->name('users/index');
    Route::get('users/create', [App\Http\Controllers\userController::class, 'create'])->name('users/create');
    Route::post('users/create', [App\Http\Controllers\userController::class, 'create'])->name('users/create');
    Route::get('users/delete/{id}', [App\Http\Controllers\userController::class, 'delete'])->name('users/delete/{id}');

});

// Forgot Password
Route::get('forgot-password', [adminController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [adminController::class, 'forgotPasswordSubmit'])->name('forgot-password');
Route::get('reset-password/{token}', [adminController::class, 'resetPassword'])->name('reset-password/{token}');
Route::post('reset-password/{id}', [adminController::class, 'upatePassword'])->name('reset-password');


