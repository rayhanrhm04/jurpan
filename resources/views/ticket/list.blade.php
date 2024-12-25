@extends('layouts.vertical', ['title' => 'Ticket', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Ticket', 'page_title' => 'Membuat Tiket'])

<div class="row">
    <div class="col-md-12">
        <!-- Filter Buttons: Status and Type -->
        <div class="btn-group flex-wrap mb-3">
            <a href="#" class="btn btn-outline-secondary">Semua</a>
            <a href="#" class="btn btn-outline-secondary">Open</a>
            <a href="#" class="btn btn-outline-secondary">Closed</a>
            <a href="#" class="btn btn-outline-secondary">Answered</a>
            <a href="#" class="btn btn-outline-secondary">User Reply</a>
        </div>
        <div class="btn-group flex-wrap mb-3">
            <a href="#" class="btn btn-outline-secondary">Semua</a>
            <a href="#" class="btn btn-outline-secondary">Pesanan</a>
            <a href="#" class="btn btn-outline-secondary">Deposit</a>
            <a href="#" class="btn btn-outline-secondary">Lainnya</a>
        </div>
    </div>

    <!-- Ticket Table Form -->
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-account-convert me-1"></i>Data Tiket</h5>
            <div class="card-body">
                <form method="get" class="row">
                    <!-- Rows per page filter -->
                    <div class="col-md-3 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">Tampilkan</span>
                            <select class="form-control" name="row" id="table-row">
                                <!-- Options for rows per page -->
                            </select>
                            <span class="input-group-text">baris.</span>
                        </div>
                    </div>
                    
                    <!-- Date Range filter -->
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <input type="date" class="form-control" name="start_date" id="table-start-date" value="">
                            <span class="input-group-text">sampai</span>
                            <input type="date" class="form-control" name="end_date" id="table-end-date" value="">
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-filter"></i></button>
                        </div>
                    </div>

                    <!-- Search filter -->
                    <div class="col-md-3 mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" id="table-search" value="" placeholder="Cari...">
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <!-- Ticket Table -->
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Ticket Rows Here -->
                            {{-- <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->created_at->format('d-m-Y') }}</td>
                                <td>{{ $ticket->updated_at->format('d-m-Y') }}</td>
                                <td>{{ $ticket->type }}</td>
                                <td>{{ $ticket->subject }}</td>
                                <td class="text-nowrap"><span class="btn btn-soft-{{ $ticket->status_class }} btn-sm font-size-13">{{ $ticket->status }}</span></td>
                                <td><a href="{{ route('ticket.reply', $ticket->id) }}" class="btn btn-primary btn-sm">Buka Tiket</a></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
