<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GroundController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PackageAdminController;
use App\Http\Controllers\PackageCustomerController;
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

// Route Get


Route::get('/', function () {
    return view('landing-page.index');
});


Route::get('/admin', [DashboardController::class, 'showDashboardForm'])->name('dashboard');

Route::get('/admin/package', [PackageAdminController::class, 'showPackageAdminForm'])->name('package');

Route::get('/admin/invoice', [InvoiceController::class, 'showInvoiceForm'])->name('invoice');

Route::get('/admin/user', [UserController::class, 'showUserForm'])->name('user');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password');

Route::get('/user/ground', [GroundController::class, 'showGroundForm'])->name('ground');

Route::get('/user/package', [PackageCustomerController::class, 'showPackageCustomerform'])->name('packagecustomer');

Route::get('/admin/invoice/invoice-list', [InvoiceController::class, 'showInvoiceListForm'])->name('invoicelist');

Route::get('/admin/invoice/invoice-preview', [InvoiceController::class, 'showInvoiceDetailForm'])->name('invoicepreview');

// Route Post
Route::post('/admin/dashboard', [DashboardController::class, 'dashboard']);
Route::post('/admin/package', [PackageAdminController::class, 'package']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'password']);
Route::post('/user/ground', [GroundController::class, 'ground']);
Route::post('/user/package', [PackageCustomerController::class, 'packagecustomer']);
Route::post('/admin/invoice', [InvoiceController::class, 'invoice']);
Route::post('/admin/user', [UserController::class, 'user']);
Route::post('/admin/invoice/invoice-list', [InvoiceController::class, 'invoicelist']);
Route::post('/admin/invoice/invoice-preview', [InvoiceController::class, 'invoicepreview']);
