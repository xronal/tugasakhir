<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GroundController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('landing-page.index');
});

Route::controller(DashboardController::class)->prefix('/admin/dashboard')->group(function () {
    Route::get('/', 'index');
});

Route::controller(PackageController::class)->prefix('/admin/package')->group(function () {
    Route::get('/', 'index');
});

Route::get('/admin/invoice', [InvoiceController::class, 'showInvoiceForm']);


Route::get('/admin/user', [UserController::class, 'showUserForm']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'password']);


Route::get('/user/ground', [GroundController::class, 'showGroundForm']);
