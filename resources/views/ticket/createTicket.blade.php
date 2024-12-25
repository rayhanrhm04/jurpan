@extends('layouts.vertical', ['title' => 'Ticket', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Ticket', 'page_title' => 'Membuat Ticket'])


<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-email-plus-outline me-1"></i>Tiket Baru</h5>
            <div class="card-body">
                <form method="POST" action="composer dump-autoload
                "> <!-- Pastikan route benar -->
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Subjek <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                        <select class="form-control" name="type" required>
                            <option value="">Pilih...</option>
                            <option value="order">Pesanan</option>
                            <option value="deposit">Deposit</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="content" rows="4" required></textarea>
                    </div>
                    <div class="mb-0">
                        <button type="submit" class="btn btn-primary waves-effect waves-light float-end">
                            <i class="mdi mdi-email-plus-outline me-1"></i>Kirim
                        </button>
                        <button type="reset" class="btn btn-danger waves-effect waves-light float-end me-2">
                            <i class="mdi mdi-refresh me-1"></i>Ulangi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-information-outline me-1"></i>Informasi</h5>
            <div class="card-body">
                <strong>Cara Membuat Tiket Baru :</strong>
                <ul>
                    <li>Input <em>Subjek</em> yang Anda inginkan.</li>
                    <li>Pilih <em>Tipe Tiket</em> (Pesanan, Deposit, Lainnya).</li>
                    <li>Kami akan segera merespon tiket Anda.</li>
                    <li>Jika ada keluhan seperti layanan dan kesalah deposit jika telah mengirim tiket dan tidak bales silahkan <a href="" class="text-colored">Whatsapp</a>.</li>
                </ul>
                <strong>Penting !</strong>
                <ul>
                    <li>Kami berhak menghapus atau memblokir akun Anda apabila terbukti melakukan tindakan pelanggaran pada Tiket.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection