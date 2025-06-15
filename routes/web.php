<?php

use App\Http\Controllers\AddOnsTransactionController;
use App\Http\Controllers\AdminController;
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
use App\Http\Controllers\PersonDateAddonsController;
use App\Http\Controllers\PersonEntryController;
use App\Http\Controllers\PersonEntryTransactionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;

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

Route::get('/detail', [PersonDateAddonsController::class, 'index'])->name('detail');

Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
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


Route::controller(CampsiteController::class)->prefix('/admin/campsite')->name('campsite.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
});

Route::controller(CustomerController::class)->prefix('/admin/user/customer')->name('customer.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
    Route::get('/editcustomer/{id}', 'editcustomer')->name('edit');
    Route::get('/addcustomer', 'addcustomer')->name('add');
});

Route::controller(AdminController::class)->prefix('/admin/user')->name('admin.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
    Route::get('/editadmin', 'editadmin')->name('edit');
    Route::get('/addadmin', 'addadmin')->name('add');
});

Route::controller(ItemController::class)->prefix('/admin/item')->name('item.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
});

Route::controller(UserController::class)->prefix('/admin/user/account')->name('user.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
});

Route::controller(TransactionController::class)->prefix('/admin/transaction')->name('transaction.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
    Route::get('/edittransaction', 'edittransaction')->name('edit');
    Route::get('/addtransaction', 'addtransaction')->name('add');
    Route::get('/getgroundbycampsite', 'getGroundByCampsite')->name('getGroundByCampsite');
    Route::get('/getdetailcampsite', 'getDetailCampsite')->name('getDetailCampsite');
    Route::get('/getdetailpackage', 'getDetailPackage')->name('getDetailPackage');
});

Route::controller(GroundDashboardController::class)->prefix('/admin/grounds')->name('grounds.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
});

Route::controller(PersonEntryController::class)->prefix('/admin/person-entry')->name('person.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update', 'update')->name('update');
    Route::get('/destroy', 'destroy')->name('destroy');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');

Route::get('/user/ground', [GroundController::class, 'index'])->name('ground');

Route::get('/user/package', [PackageCustomerController::class, 'index'])->name('packagecustomer');

// Route Post
Route::post('/admin/dashboard', [DashboardController::class, 'dashboard']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot-password']);
Route::post('/user/ground', [GroundController::class, 'ground']);
Route::post('/user/package', [PackageCustomerController::class, 'packagecustomer']);
