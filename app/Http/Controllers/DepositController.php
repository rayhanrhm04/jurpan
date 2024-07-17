<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositController extends Controller
{
    //
    public function create()
{
    return view('deposit.createDepo');
}

public function edit()
{
    return view('deposit.historyDepo');
}
}
