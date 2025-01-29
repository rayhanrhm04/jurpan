<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VoucherController;
use Illuminate\Http\Request;
use App\Models\deposit as Deposit;
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

Route::post('/callback-pay', [DepositController::class, 'callback']);

Route::get('/', function (Request $request) {
    Deposit::where('order_id', $request->success)->update([
        'status' => 'PAID',
    ]);

    return view('index_landing');
})->name('home.page');

// Route::get('/order', [orderController::class, 'index'])->name('order');
// Route::get('/historyorder', [orderController::class, 'index'])->name('historyorder');

// 
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Halaman order dan history order
    Route::get('/order-baru', [orderController::class, 'index'])->name('order');
    Route::post('/order-baru', [orderController::class, 'order'])->name('order.store');
    Route::get('/historyorder', [orderController::class, 'history'])->name('historyorder');

    Route::get('/deposit', [DepositController::class, 'index'])->name('deposit');
    Route::get('/historydeposit', [DepositController::class, 'history'])->name('historydeposit');
    Route::post('/deposit', [DepositController::class, 'deposit'])->name('deposit.store');

    Route::get('/service', [serviceController::class, 'service'])->name('services');

    Route::get('/redeem', [VoucherController::class, 'index'])->name('redeem');
    Route::get('/historyredeem', [VoucherController::class, 'history'])->name('historyredeem');

    Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.list');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/tickets/{ticket}/reply', [TicketController::class, 'reply'])->name('tickets.reply');
    Route::patch('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');


    // Route::get('/ticket', [TicketController::class, 'create'])->name('ticket');
    // Route::get('/ticket-list', [TicketController::class, 'index'])->name('ticket.list');

    // Route::get('/ticket', [TicketController::class, 'create'])->name('ticket');
    // Route::get('/list', [TicketController::class, 'list'])->name('list');

    Route::get('/ajax/get-layanan', [orderController::class, 'ajaxLayanan'])->name('ajax.layanan');
    Route::get('/ajax/amount-and-price', [orderController::class, 'getAmountAndPrice'])->name('ajax.amountAndPrice');
    
    // Route khusus untuk admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.admin');
        Route::get('/admin/report-deposit', [AdminController::class, 'report_deposit'])->name('report-deposit');
        Route::get('/admin/detail-deposit', [AdminController::class, 'detail_deposit'])->name('detail-deposit');

        Route::get('/admin/status-user', [AdminController::class, 'status_user' ])->name('status-user');
        Route::get('/admin/buat-user', [AdminController::class, 'create_user' ])->name('buat-user');

        Route::get('/admin/data-order', [AdminController::class, 'data_order' ])->name('data-order');

        // Route::get('/admin/tickets', [TicketController::class, 'adminIndex'])->name('admin.ticket.list');
        // Route::get('/admin/ticket/{ticket}', [TicketController::class, 'adminShow'])->name('tickets.reply');
        // Route::patch('/admin/ticket/{ticket}/update', [TicketController::class, 'update'])->name('tickets.update');

        Route::get('/ticket', [AdminTicketController::class, 'index'])->name('admin.ticket.list');

        // Halaman edit tiket untuk admin
        Route::get('/ticket/{ticket}/edit', [AdminTicketController::class, 'edit'])->name('admin.ticket.edit');
        Route::put('/ticket/{ticket}', [AdminTicketController::class, 'update'])->name('admin.ticket.update');

        

    });
});