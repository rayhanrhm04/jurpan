@extends('layouts.vertical', ['title' => 'User', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'User', 'page_title' => 'Buat User'])
<div class="row">
    <div class="col-md-12">
       
        <div class="btn-group flex-wrap mb-2">
            <a href=""
                class="btn btn-primary ">Semua</a>
            <a href=""
                class="btn btn-primary ">Pending</a>
            <a href=""
                class="btn btn-primary ">Processing</a>
            <a href=""
                class="btn btn-primary ">Success</a>
            <a href=""
                class="btn btn-primary ">Error</a>
            <a href=""
                class="btn btn-primary ">Partial</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-cart-arrow-up me-1"></i>Kelola Pesanan</h5>
            <div class="card-body">
                <div id="body-result"></div>
                <form method="get" class="row">
                    <input type="hidden" id="q_page" value="">
                    <input type="hidden" name="status" id="q_status" value="">
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
                            <input type="date" class="form-control" name="start_date" id="table-start-date"
                                value="">
                            <div class="input-group-prepend">
                                <span class="input-group-text">sampai</span>
                            </div>
                            <input type="date" class="form-control" name="end_date" id="table-end-date"
                                value="">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit"><i
                                        class="fas fa-fw fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" id="table-search"
                                value="" placeholder="Cari...">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit"><i
                                        class="fas fa-fw fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-uppercase">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Layanan</th>
                                <th>Target</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Profit</th>
                                <th>Provider</th>
                                <th>Provider OID</th>
                                <th>Asal</th>
                                <th>Status</th>
                                <th>Tgl. Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            <tr>
                                <td class="text-nowrap"><a href="javascript:;"
                                        onclick=""
                                        class="btn btn-primary btn-sm btn-rounded shadow"><i
                                            class="mdi mdi-eye me-1"></i></a></td>
                                <td><a href="javascript:;" class="text-primary fw-bold"
                                        onclick=""></a>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Rp</td>
                                <td>Rp</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-nowrap">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-soft-color btn-sm"><i
                                                class=""></i></button>
                                        <button type="button"
                                            class="btn btn-soft-color btn-sm dropdown-toggle dropdown-toggle-split "
                                            onclick="">
                                            <i class="mdi mdi-circle-edit-outline"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                </td>
                                <td class="text-nowrap">
                                    <a href="javascript:;"
                                        onclick=""
                                        class="btn btn-outline-warning btn-sm waves-effect waves-light"><i
                                            class="mdi mdi-circle-edit-outline me-1"></i>Ubah</a>
                                    <a href="javascript:;"
                                        onclick=""
                                        class="btn btn-outline-danger btn-sm waves-effect waves-light"><i
                                            class="mdi mdi-delete-outline me-1"></i>Hapus</a>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
              
                <ul class="pagination pagination-md mb-1">
                    
                    <li class="page-item"><a class="page-link" href="">&lsaquo;
                            First</a></li>
                    <li class="page-item"><a class="page-link"
                            href=""><span
                                aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
                   
                    <li class="page-item active primary"><a class="page-link"
                            href=""></a></li>
              
                    <li class="page-item"><a class="page-link"
                            href="</a></li>
                    
                    
                    <li class="page-item"><a class="page-link" href=""><span
                                aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
                    <li class="page-item"><a class="page-link"
                            href="">Last &rsaquo;</a></li>
                   
                </ul>
                <small class="text-muted">Menampilkan  data.</small>
              
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