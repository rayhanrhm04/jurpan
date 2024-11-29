<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\VoucherController;

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

require __DIR__ . '/auth.php';
Route::get('cron/category', 'App\Http\Controllers\cron\serviceController@category');
Route::get('cron/service', 'App\Http\Controllers\cron\serviceController@service');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/order', [orderController::class, 'index'])->name('order');
// Route::get('/historyorder', [orderController::class, 'index'])->name('historyorder');

// 
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Halaman order dan history order
    Route::get('/order-baru', [orderController::class, 'index'])->name('order');
    Route::get('/historyorder', [orderController::class, 'history'])->name('historyorder');

    Route::get('/deposit', [DepositController::class, 'index'])->name('deposit');
    Route::get('/historydeposit', [DepositController::class, 'history'])->name('historydeposit');

    Route::get('/service', [serviceController::class, 'service'])->name('services');

    Route::get('/redeem', [VoucherController::class, 'index'])->name('redeem');
    Route::get('/historyredeem', [VoucherController::class, 'history'])->name('historyredeem');

    Route::get('/ajax/get-layanan', [orderController::class, 'ajaxLayanan'])->name('ajax.layanan');
    Route::get('/ajax/amount-and-price', [orderController::class, 'getAmountAndPrice'])->name('ajax.amountAndPrice');
    
    // Route khusus untuk admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    });
});