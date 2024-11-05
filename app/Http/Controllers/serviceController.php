<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    //
    public function price(){
        return view('services.price');
    }

    public function service()
    {
        // Ambil semua data dari tabel posts
        $services = Services::paginate(10);
        // dd($services);

        // Kirim data ke view
        return view('services.price', compact('services'));
    }
}
