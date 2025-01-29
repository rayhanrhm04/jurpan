<?php

namespace App\Http\Controllers;

use App\Models\deposit as Deposit;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::id(); // Dapatkan ID user login
        $totalDepo = Deposit::where('user_id', $userId)->where('status', 'PAID')->sum('amount');
        $totalOrder = Order::where('user_id', $userId)->where('status', 'SUCCESS')->sum('amount');
        $totalDeposit = $totalDepo - $totalOrder;
        return view('index', compact('totalDeposit')); // Halaman dashboard user biasa
    }

    public function adminDashboard()
    {
        return view('admin.dashboard'); // Halaman dashboard khusus admin
    }
}
