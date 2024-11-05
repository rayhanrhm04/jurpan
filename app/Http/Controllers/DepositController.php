<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositController extends Controller
{
    //
    public function index()
{
    return view('deposit.createDepo');
}

public function history()
{
    return view('deposit.historyDepo');
}
}
