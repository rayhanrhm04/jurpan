<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    /**
     * Menampilkan halaman harga layanan.
     *
     * @return \Illuminate\View\View
     */
    public function price()
    {
        // Mengembalikan tampilan untuk halaman harga layanan
        return view('services.price');
    }

    /**
     * Mengambil semua layanan dan menampilkannya di halaman harga.
     *
     * @return \Illuminate\View\View
     */
    public function service()
    {
        // Ambil semua data dari tabel Services dengan paginasi
        $services = Services::paginate(10);

        // Kirim data layanan ke tampilan
        return view('services.price', compact('services'));
    }
}