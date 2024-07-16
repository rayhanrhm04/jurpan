<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function create()
{
    return view('order.createOrder');
}
}
