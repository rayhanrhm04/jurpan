@extends('layouts.vertical', ['title' => 'Voucher', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Voucher', 'page_title' => 'Redeem Voucher'])

<div class="row">
    <div class="col-md-12">
      
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-history me-1"></i>Riwayat Voucher</h5>
            <div class="card-body">
                <form method="get" class="row">
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tampilkan</span>
                            </div>
                            <select class="form-control" name="row" id="table-row">
                                <option value="10" >10</option>
                                <option value="25" >25</option>
                                <option value="50" >50</option>
                                <option value="100" >100</option>
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text">baris.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date" id="table-start-date" value="">
                            <div class="input-group-prepend">
                                <span class="input-group-text">sampai</span>
                            </div>
                            <input type="date" class="form-control" name="end_date" id="table-end-date" value="">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" id="table-search" value="" placeholder="Cari...">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-uppercase">
                                <th>ID</th>
                                <th>Kode Voucher</th>
                                <th>Jumlah Saldo</th>
                                <th>Tgl. Deposit</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Rp </td>
                                        <td></td>
                                    </tr>
                            
                        </tbody>
                    </table>
                </div>
               
                    </ul>
                    <small class="text-muted">Menampilkan 1 sampai 10 data.</small>
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_modal_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detail_modal_body">
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
