<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    //
    public function create() {
        return view('ticket.createTicket'); // Pastikan nama view sesuai
    }


    public function index(Request $request)
    {
        // Ambil semua parameter filter
        $status = $request->get('status', 'semua'); // Status tiket
        $type = $request->get('type', 'semua');     // Tipe tiket
        $rowsPerPage = $request->get('row', 10);    // Jumlah baris per halaman
        $startDate = $request->get('start_date');   // Tanggal mulai
        $endDate = $request->get('end_date');       // Tanggal selesai
        $search = $request->get('search');          // Kata kunci pencarian

        // Query Tiket
        $query = Ticket::query();

        // Filter Status
        if ($status !== 'semua') {
            $query->where('status', $status);
        }

        // Filter Tipe
        if ($type !== 'semua') {
            $query->where('type', $type);
        }

        // Filter Tanggal
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Filter Pencarian
        if ($search) {
            $query->where('subject', 'like', '%' . $search . '%');
        }

        // Ambil data dengan paginasi
        $tickets = $query->paginate($rowsPerPage);

        return view('ticket.list', compact('tickets', 'status', 'type', 'rowsPerPage', 'startDate', 'endDate', 'search'));
    }
    // public function list(){
    //     return view('ticket.list');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'type' => 'required|in:order,deposit,other',
            'content' => 'required|string',
        ]);

        Ticket::create([
            'subject' => $request->subject,
            'type' => $request->type,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Tiket berhasil dikirim!');
    }

    public function reply($id)
    {
    $ticket = Ticket::findOrFail($id); // Dapatkan tiket berdasarkan ID
    return view('ticket.reply', compact('ticket'));
    }   



public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'status' => 'required|string',
        'reply' => 'nullable|string',
    ]);

    // Cari tiket berdasarkan ID
    $ticket = Ticket::findOrFail($id);

    // Update status tiket dan balasan
    $ticket->status = $validated['status'];
    if ($request->has('reply')) {
        $ticket->reply = $validated['reply']; // Simpan balasan dari admin
    }
    $ticket->save(); // Simpan perubahan

    // Redirect kembali ke daftar tiket admin
    return redirect()->route('admin.ticket.list')->with('success', 'Tiket berhasil diperbarui!');
}

}
