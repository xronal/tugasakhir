<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\DashboardController;

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
