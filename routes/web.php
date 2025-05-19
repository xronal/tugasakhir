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


Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/user', [DashboardController::class, 'indexuser'])->name('dashboarduser');

Route::controller(PackageAdminController::class)->prefix('/admin/package')->name('package.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
    Route::get('/editpackage', 'edit')->name('edit');
    Route::get('/addpackage', 'addpackage')->name('addpackage');
});

Route::get('/admin/invoice', [InvoiceController::class, 'showInvoiceForm'])->name('invoice');

Route::get('/admin/user', [UserController::class, 'index'])->name('user');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');

Route::get('/user/ground', [GroundController::class, 'index'])->name('ground');

Route::get('/user/package', [PackageCustomerController::class, 'index'])->name('packagecustomer');

Route::get('/admin/invoice/invoice-list', [InvoiceController::class, 'showInvoiceListForm'])->name('invoicelist');

Route::get('/admin/invoice/invoice-preview', [InvoiceController::class, 'showInvoiceDetailForm'])->name('invoicepreview');

Route::get('/admin/transaction/addons-trans', [AddOnsTransactionController::class, 'index'])->name('addons');

// Route::get('/admin/campsite/campsite', [CampsiteController::class, 'index'])->name('campsite');
Route::controller(CampsiteController::class)->prefix('/admin/campsite/campsite')->name('campsite.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
    Route::delete('/bulk-delete', 'bulkDelete')->name('bulkDelete');
});

Route::get('/admin/customer/customer', [CustomerController::class, 'index'])->name('customer');

Route::get('/admin/grounds/ground', [GroundDashboardController::class, 'index'])->name('grounddashboard');

// Route::get('/admin/item/item', [ItemController::class, 'index'])->name('item');
Route::controller(ItemController::class)->prefix('/admin/item')->name('item.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
});

Route::get('/admin/package/package-detail', [PackageDetailController::class, 'index'])->name('packagedetail');

Route::get('/admin/customer/person-entry', [PersonEntryController::class, 'index'])->name('personentry');

Route::get('/admin/transaction/transaction', [TransactionController::class, 'index'])->name('transaction');

// Route Post
Route::post('/admin/dashboard', [DashboardController::class, 'dashboard']);
// Route::post('/admin/package', [PackageAdminController::class, 'package']);
// Route::post('/admin/package/add-package', [PackageAdminController::class, 'addpackage']);
// Route::post('/admin/package/addpackage', [PackageAdminController::class, 'addpackage']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot-password']);
Route::post('/user/ground', [GroundController::class, 'ground']);
Route::post('/user/package', [PackageCustomerController::class, 'packagecustomer']);
Route::post('/admin/invoice', [InvoiceController::class, 'invoice']);
Route::post('/admin/user', [UserController::class, 'user']);
Route::post('/admin/invoice/invoice-list', [InvoiceController::class, 'invoicelist']);
Route::post('/admin/invoice/invoice-preview', [InvoiceController::class, 'invoicepreview']);
Route::post('/admin/transaction/addons-trans', [AddOnsTransactionController::class, 'addons']);
Route::post('/admin/campsite/campsite', [CampsiteController::class, 'campsite']);
Route::post('/admin/customer/customer', [CustomerController::class, 'customer']);
Route::post('/admin/grounds/ground', [GroundDashboardController::class, 'grounddashboard']);
Route::post('/admin/item/item', [ItemController::class, 'item']);
Route::post('/admin/package/package-detail', [PackageDetailController::class, 'packagedetail']);
Route::post('/admin/customer/person-entry', [PersonEntryController::class, 'personentry']);
Route::post('/admin/transaction/transaction', [TransactionController::class, 'transaction']);
