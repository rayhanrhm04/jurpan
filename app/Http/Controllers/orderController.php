<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{categories, Services};
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    //
    public function index(){
        $categories= categories::orderBy('name', 'asc')->get();
       
        return view('order.createOrder', compact('categories'));
    }

    public function history(){
        return view('order.historyOrder');
    }

    public function ajaxLayanan(Request $request){
        $category_id = $request->get('category_id');
        $services= Services::where('category_id', '=', $category_id)->get();
        return response()->json($services);
    }
    public function getAmountAndPrice(Request $request)
    {
        // Ambil ID kategori dari permintaan
        $category_id = $request->input('category_id');

        // Query ke database untuk mendapatkan data min, max, dan price
        $data = DB::table('services')
            ->where('category_id', $category_id)
            ->select('min', 'max', 'price') // Pastikan kolom sesuai dengan database Anda
            ->first();

        // Kembalikan data dalam format JSON
        return response()->json($data);
    }
    // public function description(Request $request){
    //     $category_id = $request->get('category_id');
    //     $services= Services::
    // }
}
