<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    //
    public function index(Request $request)
    {
        // Menampilkan tiket berdasarkan status dan tipe
        $tickets = Ticket::query();

        if ($request->has('status')) {
            $tickets->where('status', $request->status);
        }

        if ($request->has('type')) {
            $tickets->where('type', $request->type);
        }

        $tickets = $tickets->paginate(10);

        return view('admin.ticket.index', compact('tickets'));
    }

    public function edit(Ticket $ticket)
    {
        // Menampilkan halaman edit untuk tiket tertentu
        return view('admin.ticket.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
{
    // Temukan tiket berdasarkan ID
    $ticket = Ticket::findOrFail($id);

    // Pastikan tiket bukan dalam status 'closed' sebelum memperbolehkan balasan
    if ($ticket->status === 'closed') {
        return redirect()->route('admin.ticket.list')->with('error', 'Tiket ini sudah ditutup, balasan tidak diperbolehkan.');
    }

    // Validasi input
    $request->validate([
        'status' => 'required|in:open,closed,answered,user-reply',
        'admin_reply' => 'nullable|string|max:255',
    ]);

    // Perbarui balasan admin
    $ticket->admin_reply = $request->input('admin_reply'); // Simpan balasan admin
    $ticket->status = $request->input('status'); // Perbarui status tiket
    $ticket->save();

    // Redirect atau tampilkan pesan sukses
    return redirect()->route('admin.ticket.list')->with('success', 'Tiket berhasil diperbarui!');
}

    
    

}
