@extends('layouts.vertical', ['title' => 'Ticket', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Ticket', 'page_title' => 'Edit Tiket'])

<!-- Start Card Container -->
<div class="card">
    <div class="card-header">
        <h5><i class="mdi mdi-pencil-outline me-2"></i>Edit Tiket</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.ticket.update', $ticket->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Subject Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Subjek</label>
                        <input type="text" class="form-control" value="{{ $ticket->subject }}" readonly>
                    </div>
                </div>

                <!-- Status Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            <option value="answered" {{ $ticket->status == 'answered' ? 'selected' : '' }}>Answered</option>
                            <option value="user-reply" {{ $ticket->status == 'user-reply' ? 'selected' : '' }}>User Reply</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- User Message Display -->
            <div class="mb-3">
                <label class="form-label">Pesan dari User</label>
                <textarea class="form-control" rows="4" readonly>{{ $ticket->content }}</textarea>
            </div>

            <!-- Admin Reply Field (Hanya Tampil Jika Status Tidak Closed) -->
            @if($ticket->status != 'closed')
                <div class="mb-3">
                    <label class="form-label">Balasan Admin</label>
                    <textarea class="form-control" name="admin_reply" rows="4">{{ old('admin_reply', $ticket->admin_reply) }}</textarea>
                    @error('admin_reply')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            @else
                <div class="alert alert-warning mt-1">Tiket ini sudah ditutup, tidak dapat dibalas.</div>
            @endif

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between">
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="mdi mdi-refresh me-1"></i>Ulangi
                </button>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="mdi mdi-circle-edit-outline me-1"></i>Ubah
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
