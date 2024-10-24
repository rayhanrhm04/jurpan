<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    //
    public function index(){
        return view('index_landing');
    }

    // public function indexadmin(){
    //     return view('admin.indexadmin');
    // }
    
}
