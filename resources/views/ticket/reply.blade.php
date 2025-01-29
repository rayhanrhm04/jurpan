@extends('layouts.vertical', ['title' => 'Reply Ticket'])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Ticket', 'page_title' => 'Balas Tiket'])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-reply me-1"></i>Balas Tiket</h5>
            <div class="card-body">
                <h5>Subjek: {{ $ticket->subject }}</h5>
                <p><strong>Tipe:</strong> {{ ucfirst($ticket->type) }}</p>
                <p><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
                <p><strong>Pesan:</strong> {{ $ticket->content }}</p>
                <hr>

                <!-- Display Admin's Reply if it exists -->
                @if($ticket->admin_reply)
                    <div class="mb-3">
                        <label class="form-label"><strong>Balasan Admin:</strong></label>
                        <textarea class="form-control" rows="4" readonly>{{ $ticket->admin_reply }}</textarea>
                    </div>
                    <hr>
                @endif

                <!-- Form for Reply (Only if status is not closed or if user is admin) -->
                @if($ticket->status !== 'closed' || auth()->user()->role === 'admin')
                    <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Balasan <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="reply" rows="4" required></textarea>
                        </div>
                        <div class="mb-0">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                <i class="mdi mdi-reply me-1"></i>Balas
                            </button>
                        </div>
                    </form>
                @elseif(auth()->user()->role === 'user')
                    <div class="alert alert-warning mt-3">Tiket ini sudah ditutup. Anda tidak dapat membalas lagi.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
