<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function create() {
        return view('ticket.createTicket'); // Pastikan nama view sesuai
    }

    public function list(){
        return view('ticket.list');
    }
}
