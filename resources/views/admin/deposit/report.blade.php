@extends('layouts.vertical', ['title' => 'Pemesanan', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Deposit', 'page_title' => 'Laporan Deposit'])
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-wallet-outline me-1"></i>Laporan Deposit</h5>
            <div class="card-body">
                <form method="get" class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date" id="table-start-date" value="">
                            <div class="input-group-prepend">
                                <span class="input-group-text">sampai</span>
                            </div>
                            <input type="date" class="form-control" name="end_date" id="table-end-date" value="">
                            <div class="input-group-append">
                                <button class="btn btn-primary waves-effect waves-light" type="submit"><i class="mdi mdi-filter-outline me-1"></i>Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="alert alert-info"><i class="mdi mdi-information-outline me-1"></i>Menampilkan Informasi <em><b></b></em></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Lunas</th>
                            <td>Rp  deposit.</td>
                        </tr>
                        <tr>
                            <th>Dibatalkan</th>
                            <td>Rp  deposit.</td>
                        </tr>
                        <tr>
                            <th>Menunggu Pembayaran</th>
                            <td>Rp  deposit.</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection