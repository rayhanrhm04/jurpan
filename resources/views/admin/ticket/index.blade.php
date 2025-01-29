<!-- resources/views/admin/ticket/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Ticket', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Ticket', 'page_title' => 'Daftar Tiket'])

<!-- Start of table container -->
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Subjek</th>
                <th>Status</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->subject }}</td>
                    <td>
                        <span class="badge rounded-pill bg-{{ $ticket->status == 'open' ? 'info' : ($ticket->status == 'answered' ? 'success' : 'secondary') }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td>{{ $ticket->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('admin.ticket.edit', $ticket->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-3">
    {{ $tickets->links() }}
</div>
@endsection
