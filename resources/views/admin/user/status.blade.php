@extends('layouts.vertical', ['title' => 'User', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'User', 'page_title' => 'Status User'])

<div id="modal-result"></div>
<form id="form">
    <input type="hidden" name="csrf_token" value="">
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" value="" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select class="form-control" name="status">
            <option value="Active" >Aktif</option>
            <option value="Inactive" >Tidak Aktif</option>
            <option value="Unverified">Belum Verifikasi</option>
        </select>
    </div>
    <div class="float-end mb-0">
        <button type="reset" class="btn btn-danger btn-sm waves-effect waves-light"><i class="mdi mdi-refresh me-1"></i>Ulangi</button>
        <button type="button" onclick="" class="btn btn-primary btn-sm waves-effect waves-light"><i class="mdi mdi-circle-edit-outline me-1"></i>Ubah</button>
    </div>
</form>

@endsection