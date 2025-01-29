<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.indexadmin'); // Pastikan Anda memiliki file view ini
    }

    public function report_deposit(){
        return view("admin.deposit.report");
    }

    public function detail_deposit(){
        return view("admin.deposit.detail");
    }

    public function status_user(){
        return view("admin.user.status");
    }

    public function create_user(){
        return view("admin.user.create");
    }

    public function data_order(){
        return view("admin.order.data");
    }
}
