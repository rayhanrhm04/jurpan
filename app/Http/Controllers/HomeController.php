<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('index'); // Halaman dashboard user biasa
    }

    public function adminDashboard()
    {
        return view('admin.dashboard'); // Halaman dashboard khusus admin
    }
}
