<?php

use App\Http\Controllers\AddOnsTransactionController;
use App\Http\Controllers\CampsiteController;
use App\Http\Controllers\CampsiteTransactionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GroundController;
use App\Http\Controllers\GroundDashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PackageAdminController;
use App\Http\Controllers\PackageCustomerController;
use App\Http\Controllers\PackageDetailController;
use App\Http\Controllers\PersonEntryController;
use App\Http\Controllers\PersonEntryTransactionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
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

Route::get('/admin/transaction/addons-trans', [AddOnsTransactionController::class, 'showAddOnsTransactionForm'])->name('addons');

Route::get('/admin/campsite/campsite', [CampsiteController::class, 'ShowCampsiteForm'])->name('campsite');

Route::get('/admin/transaction/campsite-trans', [CampsiteTransactionController::class, 'ShowCampsiteTransactionForm'])->name('campsitetrans');

Route::get('/admin/customer/customer', [CustomerController::class, 'ShowCustomerForm'])->name('customer');

Route::get('/admin/grounds/ground', [GroundDashboardController::class, 'ShowGroundDashboardForm'])->name('grounddashboard');

Route::get('/admin/item/item', [ItemController::class, 'ShowItemForm'])->name('item');

Route::get('/admin/package/package-detail', [PackageDetailController::class, 'showPackageDetailForm'])->name('packagedetail');

Route::get('/admin/customer/person-entry', [PersonEntryController::class, 'showPersonEntryForm'])->name('personentry');

Route::get('/admin/transaction/person-entry-trans', [PersonEntryTransactionController::class, 'ShowPersonEntryTransactionForm'])->name('personentrytrans');

Route::get('/admin/transaction/transaction', [TransactionController::class, 'ShowTransactionForm'])->name('transaction');

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
Route::post('/admin/transaction/addons-trans', [AddOnsTransactionController::class, 'addons']);
Route::post('/admin/campsite/campsite', [CampsiteController::class, 'campsite']);
Route::post('/admin/transaction/campsite-trans', [CampsiteTransactionController::class, 'campsitetrans']);
Route::post('/admin/customer/customer', [CustomerController::class, 'customer']);
Route::post('/admin/grounds/ground', [GroundDashboardController::class, 'grounddashboard']);
Route::post('/admin/item/item', [ItemController::class, 'item']);
Route::post('/admin/package/package-detail', [PackageDetailController::class, 'packagedetail']);
Route::post('/admin/customer/person-entry', [PersonEntryController::class, 'personentry']);
Route::post('/admin/transaction/person-entry-trans', [PersonEntryTransactionController::class, 'personentrytrans']);
Route::post('/admin/transaction/transaction', [TransactionController::class, 'transaction']);
