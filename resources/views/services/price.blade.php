@extends('layouts.vertical', ['title' => 'Layanan', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Layanan', 'page_title' => 'Daftar Harga'])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-clipboard-flow-outline me-1"></i>Daftar Layanan</h5>
            <div class="card-body">
          
                <form method="get" class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Kategori</span>
                            </div>
                            <select class="default-select2 form-control" name="category" id="table-category">
                                <option value="all">Semua</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" id="table-search" value="" placeholder="Cari...">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-primary">
                                        <th colspan="6">
                                            <h5 class="d-none d-md-block d-lg-block text-center mb-0"></h5>
                                            <h5 class="d-block d-md-none d-lg-none mb-0"></h5>
                                        </th>
                                    </tr>
                                    <tr class="text-uppercase">
                                        <th>ID</th>
                                        <th>Favorit</th>
                                        <th>Layanan</th>
                                        <th>Min</th>
                                        <th>Maks</th>
                                        <th>Harga/1000</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-">
                                    
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Rp </td>
                                        </tr>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <ul class="pagination pagination-sm mb-1" id="tfoot-">
                                            
                                            </ul>
                                            {{-- <small class="text-muted" id="tinfo-<?= $category['id']; ?>">Menampilkan <?= ($count_row > 0) ? $starting_position + 1 : '0'; ?> sampai <?= ($current_page != $total_no_of_pages) ? $count_row + $starting_position : $total_no_of_records; ?> dari <?= $total_no_of_records; ?> data.</small> --}}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
