<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{categories, Services};
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

    // public function description(Request $request){
    //     $category_id = $request->get('category_id');
    //     $services= Services::
    // }
}
