<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Menampilkan halaman landing index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengembalikan tampilan untuk halaman landing
        return view('index_landing');
    }

    // Uncomment jika ingin menampilkan halaman admin
    // public function indexAdmin()
    // {
    //     // Mengembalikan tampilan untuk halaman admin
    //     return view('admin.indexadmin');
    // }
    
}
