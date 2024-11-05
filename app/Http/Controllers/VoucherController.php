<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{
    //
    public function index(){
        return view('voucher.redeem');
    }

    public function history(){
        return view('voucher.historyvoucher');
    }
}
