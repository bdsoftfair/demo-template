<?php

use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UserController;

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

/**************************************************************************
 *  BACKEND ROUTES
 *************************************************************************/

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->name('admin.dashboard');

// role permission route
// middleware('auth')->
    Route::prefix('/admin')->group(function(){
        Route::resource('/roles', RolesController::class);
    });
// admin dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// admin create user route
    Route::prefix('/admins')->group(function(){
        Route::get('/list', [AdminsController::class, 'adminList'])->name('admin.list');
        Route::get('/create', [AdminsController::class, 'createAdmin'])->name('admin.create');
        Route::post('/store', [AdminsController::class, 'storeAdmin'])->name('admin.store');
        Route::get('/edit/{id}', [AdminsController::class, 'editAdmin'])->name('admin.edit');
        Route::post('/update/{id}', [AdminsController::class, 'updateAdmin'])->name('admin.update');
        Route::get('/delete/{id}', [AdminsController::class, 'deleteAdmin'])->name('admin.delete');
    });

// admin login route
    Route::prefix('/admin')->group(function(){
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login/submit', [LoginController::class, 'login'])->name('admin.login.submit');
        Route::post('/logout/submit', [LoginController::class, 'logout'])->name('admin.logout.submit');
        // admin forgetr password route
        Route::get('/password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('admin.password.request');
        Route::post('/password/reset/submit', [LoginController::class, 'reset'])->name('admin.password.update');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
