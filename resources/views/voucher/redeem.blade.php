@extends('layouts.vertical', ['title' => 'Voucher', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Voucher', 'page_title' => 'Redeem'])

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-ticket me-1"></i>Redeem Voucher</h5>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                    <div class="mb-3">
                        <label class="form-label">Kode Voucher</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="code" placeholder="XXXXXXXXXX">
                        </div>
                    </div>
                    <div class="mb-0">
                        <button type="submit" class="btn btn-primary waves-effect waves-light float-end"><i class="mdi mdi-wallet-plus-outline me-1"></i>Redeem</button>
                        <button type="reset" class="btn btn-danger waves-effect waves-light float-end me-2"><i class="mdi mdi-refresh me-1"></i>Ulangi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-information-outline me-1"></i>Informasi</h5>
            <div class="card-body">
                <strong>Cara Melakukan Redeem Voucher :</strong>
                <ul>
                    <li>Input <em>Kode Voucher</em> Anda.</li>
                    <li>Saldo akan otomatis bertambah jika redeem voucher berhasil.</li>
                </ul>
                <strong>Penting !</strong>
                <ul>
                    <li>Kami berhak menghapus atau memblokir akun Anda apabila terbukti melakukan kecurangan pada Redeem Voucher.</li>
                    <li>Jika terjadi error silahkan hubungin whatsapp kita ,<a href="""
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
