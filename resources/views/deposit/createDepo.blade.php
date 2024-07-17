@extends('layouts.vertical', ['title' => 'Deposit', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Deposit', 'page_title' => 'Deposit Baru'])

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-wallet-plus-outline me-1"></i>Deposit Baru</h5>
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Jenis Permintaan <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="otomatis" value="auto">
                            <label class="form-check-label" for="otomatis">Otomatis</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="manual" value="manual">
                            <label class="form-check-label" for="manual">Manual</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Pembayaran <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="bank" value="bank">
                            <label class="form-check-label" for="bank">Bank</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="ewallet" value="ewallet">
                            <label class="form-check-label" for="ewallet">E-Wallet / Scan QRIS / All Bank ( Virtual Account )</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="pulsa" value="pulsa">
                            <label class="form-check-label" for="pulsa">Pulsa</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>
                        <select class="form-control" name="method" id="method">
                            <option value="0">Pilih Jenis Pembayaran & Permintaan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Minimal Deposit</label>
                        <div class="input-group">
                            <div class="input-group-text">Rp.</div>
                            <input type="text" class="form-control" id="min-amount" value="0" readonly>
                        </div>
                    </div>
                    <div class="mb-3 d-none" id="phone">
                        <label class="form-label">Nomor Pengirim</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="phone" id="phone_number" placeholder="08xxx">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Jumlah Deposit <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text">Rp.</div>
                                <input type="number" class="form-control" name="amount" id="post-amount" placeholder="50000">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Saldo Diterima</label>
                            <div class="input-group">
                                <div class="input-group-text">Rp.</div>
                                <input type="text" class="form-control" id="amount" value="0" readonly>
                            </div>
                        </div>
                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary waves-effect waves-light float-end"><i class="mdi mdi-wallet-plus-outline me-1"></i>Deposit</button>
                            <button type="reset" class="btn btn-danger waves-effect waves-light float-end me-2"><i class="mdi mdi-refresh me-1"></i>Ulangi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-information-outline me-1"></i>Informasi</h5>
            <div class="card-body">
                <strong>Cara Melakukan Deposit Baru :</strong>
                <ul>
                    <li>Pilih <em>Jenis Permintaan</em>.</li>
                    <li>Pilih <em>Jenis Pembayaran</em>.</li>
                    <li>Pilih <em>Metode Pembayaran</em>.</li>
                    <li>Input <em>Jumlah Deposit</em> yang Anda inginkan.</li>
                    <li>Transfer Pembayaran sesuai dengan nominal yang tertera.</li>
                    <li>Saldo akan otomatis bertambah dalam beberapa menit apabila Anda menggunakan <em>Jenis Permintaan</em> <b><em>OTOMATIS</em></b>.</li>
                </ul>
                <strong>Penting !</strong>
                <ul>
                    <li>Kami berhak menghapus atau memblokir akun Anda apabila terbukti melakukan kecurangan pada Deposit.</li>
                    <li>Jika menggunakan <em>Jenis Permintaan</em> <b><em>MANUAL</em></b>, harap konfirmasi ke Admin agar Permintaan Deposit segera diterima.</li>
                    <li>Jika Deposit belum masuk silahkan hubungi whatsapp kami, <a href="{{ url('whatsapp') }}" class="text-colored">clicknow</a>.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
