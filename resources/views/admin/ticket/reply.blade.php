@extends('layouts.vertical', ['title' => 'Ticket', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Ticket', 'page_title' => 'Menanggapi Tiket'])

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-email-plus-outline me-1"></i>Balasan Tiket</h5>
            <div class="card-body">
                <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
                    @csrf
                    @method('PATCH')
                    
                    <!-- Menampilkan Subjek Tiket -->
                    <div class="mb-3">
                        <label class="form-label">Subjek</label>
                        <input type="text" class="form-control" value="{{ $ticket->subject }}" readonly>
                    </div>

                    <!-- Menampilkan Pesan yang Dikirim User -->
                    <div class="mb-3">
                        <label class="form-label">Pesan dari User</label>
                        <textarea class="form-control" rows="4" readonly>{{ $ticket->content }}</textarea>
                    </div>

                    <!-- Status Tiket -->
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            <option value="answered" {{ $ticket->status == 'answered' ? 'selected' : '' }}>Answered</option>
                            <option value="user-reply" {{ $ticket->status == 'user-reply' ? 'selected' : '' }}>User Reply</option>
                        </select>
                    </div>

                    <!-- Form untuk Balasan Admin -->
                    <div class="mb-3">
                        <label class="form-label">Balasan</label>
                        <textarea class="form-control" name="reply" rows="4">{{ $ticket->reply }}</textarea>
                    </div>

                    <!-- Tombol untuk mengubah status dan balasan -->
                    <div class="float-end mb-0">
                        <button type="reset" class="btn btn-danger btn-sm waves-effect waves-light">
                            <i class="mdi mdi-refresh me-1"></i>Ulangi
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">
                            <i class="mdi mdi-circle-edit-outline me-1"></i>Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
