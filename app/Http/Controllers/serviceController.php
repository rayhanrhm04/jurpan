<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class serviceController extends Controller
{
    //
    public function price(){
        return view('services.price');
    }
}
