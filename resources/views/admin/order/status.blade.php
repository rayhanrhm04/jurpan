@extends('layouts.vertical', ['title' => 'Order', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Order', 'page_title' => 'Status Pemesanan'])

<div id="modal-result"></div>
<form id="form">
    <input type="hidden" name="csrf_token" value="">
    <div class="mb-3">
        <label class="form-label">ID Pesanan</label>
        <input type="text" class="form-control" value="<?= $data_target['rows']['id']; ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select class="form-control" name="status">
            <option value="Pending" >Pending
            </option>
            <option value="Processing" >
                Processing</option>
            <option value="Success" >Success
            </option>
            <option value="Error" >Error</option>
            <option value="Partial" >Partial
            </option>
        </select>
    </div>
    <div class="float-end mb-0">
        <button type="reset" class="btn btn-danger btn-sm waves-effect waves-light"><i
                class="mdi mdi-refresh me-1"></i>Ulangi</button>
        <button type="button"
            onclick=""
            class="btn btn-primary btn-sm waves-effect waves-light"><i
                class="mdi mdi-circle-edit-outline me-1"></i>Ubah</button>
    </div>
</form>

@endsection