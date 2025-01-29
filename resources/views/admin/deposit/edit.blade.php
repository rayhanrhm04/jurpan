@extends('layouts.vertical', ['title' => 'Pemesanan', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Deposit', 'page_title' => 'Laporan Deposit'])
<div id="modal-result"></div>
<div class="alert alert-info">Jika data deposit <em><b>diterima</b></em>, saldo akan otomatis ditambahkan ke pengguna.
    Deposit akan otomatis dibatalkan setelah melewati <em><b></b></em>.</div>
<form id="form">
    <input type="hidden" name="csrf_token" value="">
    <div class="mb-3">
        <label class="form-label">ID Deposit</label>
        <input type="number" class="form-control" value="" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select class="form-control" name="status">
            <option value="0">Pilih...</option>
            <option value="accept">Terima</option>
            <option value="reject">Tolak</option>
        </select>
    </div>
    <div class="float-end mb-0">
        <button type="reset" class="btn btn-danger btn-sm waves-effect waves-light"><i
                class="mdi mdi-refresh me-1"></i>Ulangi</button>
        <button type="button"
            onclick="btn_post('#form','');"
            class="btn btn-primary btn-sm waves-effect waves-light"><i
                class="mdi mdi-circle-edit-outline me-1"></i>Ubah</button>
    </div>
</form>
@endsection