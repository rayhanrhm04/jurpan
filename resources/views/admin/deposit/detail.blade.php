@extends('layouts.vertical', ['title' => 'Deposit', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Deposit', 'page_title' => 'Detail Deposit'])
<div class="row mb-3">
    <div class="col-md-6">
        <strong>Informasi</strong>
    </div>
    <div class="col-md-6">
        <textarea class="form-control" rows="3" readonly></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <strong>Pembaruan Terakhir</strong>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" value="" readonly>
    </div>
    <div class="col-md-12 mt-4">
        <button type="button" class="btn btn-danger btn-sm waves-effect waves-light float-end" data-bs-dismiss="modal"><i class="mdi mdi-close-circle-outline me-1"></i>Tutup</button>
    </div>
</div>
@endsection