@extends('layouts.vertical', ['title' => 'Ticket', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Ticket', 'page_title' => 'Membuat Tiket'])
<div class="row">
    <div class="col-md-12">
        <!-- Filter Buttons: Status and Type -->
        <div class="btn-group flex-wrap mb-3">
            <a href="{{ route('ticket.list', array_merge(request()->except('status'), ['status' => 'semua'])) }}" class="btn btn-outline-secondary">Semua</a>
            <a href="{{ route('ticket.list', array_merge(request()->except('status'), ['status' => 'open'])) }}" class="btn btn-outline-secondary">Open</a>
            <a href="{{ route('ticket.list', array_merge(request()->except('status'), ['status' => 'closed'])) }}" class="btn btn-outline-secondary">Closed</a>
            <a href="{{ route('ticket.list', array_merge(request()->except('status'), ['status' => 'answered'])) }}" class="btn btn-outline-secondary">Answered</a>
            <a href="{{ route('ticket.list', array_merge(request()->except('status'), ['status' => 'user-reply'])) }}" class="btn btn-outline-secondary">User Reply</a>
        </div>
        <div class="btn-group flex-wrap mb-3">
            <a href="{{ route('ticket.list', array_merge(request()->except('type'), ['type' => 'semua'])) }}" class="btn btn-outline-secondary">Semua</a>
            <a href="{{ route('ticket.list', array_merge(request()->except('type'), ['type' => 'order'])) }}" class="btn btn-outline-secondary">Pesanan</a>
            <a href="{{ route('ticket.list', array_merge(request()->except('type'), ['type' => 'deposit'])) }}" class="btn btn-outline-secondary">Deposit</a>
            <a href="{{ route('ticket.list', array_merge(request()->except('type'), ['type' => 'other'])) }}" class="btn btn-outline-secondary">Lainnya</a>
        </div>
    </div>

    <!-- Ticket Table Form -->
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-account-convert me-1"></i>Data Tiket</h5>
            <div class="card-body">
                <form method="get" class="row">
                    <div class="col-md-3 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">Tampilkan</span>
                            <select class="form-control" name="row">
                                @foreach([5, 10, 25, 50] as $option)
                                    <option value="{{ $option }}" {{ $rowsPerPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text">baris.</span>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <input type="date" class="form-control" name="start_date" value="{{ $startDate }}">
                            <span class="input-group-text">sampai</span>
                            <input type="date" class="form-control" name="end_date" value="{{ $endDate }}">
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-filter"></i></button>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Cari...">
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-uppercase">
                                <th>ID</th>
                                <th>Tgl. Dibuat</th>
                                <th>Tgl. Pembaruan</th>
                                <th>Tipe</th>
                                <th>Subjek</th>
                                <th>Status</th>
                                <th>Balasan Admin</th> <!-- Added column for Admin's Reply -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $ticket->updated_at->format('d-m-Y') }}</td>
                                    <td>{{ $ticket->type }}</td>
                                    <td>{{ $ticket->subject }}</td>
                                    <td><span class="badge bg-{{ $ticket->status_class }}">{{ $ticket->status }}</span></td>
                                    
                                    <!-- Display Admin's Reply -->
                                    <td>
                                        @if($ticket->admin_reply)
                                            <span class="text-muted">{{ $ticket->admin_reply }}</span>
                                        @else
                                            <span class="text-danger">Belum ada balasan.</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('tickets.reply', $ticket->id) }}" class="btn btn-primary btn-sm">Buka Tiket</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Tidak ada tiket yang ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $tickets->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
