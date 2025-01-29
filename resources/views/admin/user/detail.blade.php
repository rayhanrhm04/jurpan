@extends('layouts.vertical', ['title' => 'Deposit', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Deposit', 'page_title' => 'Detail Deposit'])
<div id="modal-result"></div>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr class="table-primary">
            <th colspan="2" class="text-center text-uppercase">Informasi Umum</th>
        </tr>
        <tr>
            <th>Email</th>
            <td></td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td></td>
        </tr>
        <tr>
            <th>Username</th>
            <td></td>
        </tr>
        <tr>
            <th>Saldo</th>
            <td>Rp </td>
        </tr>
        <tr>
            <th>Status</th>
            <td></td>
        </tr>
        <tr>
            <th>Zona Waktu</th>
            <td></td>
        </tr>
        <tr>
            <th>Tgl. Dibuat</th>
            <td></td>
        </tr>
        <tr class="table-primary">
            <th colspan="2" class="text-center text-uppercase">Informasi Lainnya</th>
        </tr>
        <tr>
            <th>Total Deposit</th>
            <td>Rp .</td>
        </tr>
        <tr>
            <th>Total Pemesanan</th>
            <td>Rp .</td>
        </tr>
    </table>
</div>
<button type="button" class="btn btn-primary waves-effect waves-light float-end" data-bs-dismiss="modal"><i class="mdi mdi-close-circle-outline me-1"></i>Tutup</button>



@endsection