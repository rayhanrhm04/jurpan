@extends('layouts.vertical', ['title' => 'Deposit', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Deposit', 'page_title' => 'Riwayat Deposit'])

<div class="row">
    <div class="col-md-12">
        <div class="btn-group flex-wrap mb-3">
            {{-- <a href="{{ url('deposit/history') }}" class="btn btn-primary {{ (empty($q_status) or $q_status == '') ? 'active' : '' }}">Semua</a>
            <a href="{{ url('deposit/history?status=pending') }}" class="btn btn-primary {{ ($q_status == 'pending') ? 'active' : '' }}">Menunggu Pembayaran</a>
            <a href="{{ url('deposit/history?status=canceled') }}" class="btn btn-primary {{ ($q_status == 'canceled') ? 'active' : '' }}">Dibatalkan</a>
            <a href="{{ url('deposit/history?status=success') }}" class="btn btn-primary {{ ($q_status == 'success') ? 'active' : '' }}">Lunas</a> --}}
        </div>
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-history me-1"></i>Riwayat Deposit</h5>
            <div class="card-body">
                <form method="get" class="row">
                    {{-- @if (isset($q_status) and !empty($q_status))
                        <input type="hidden" name="status" id="q_status" value="{{ $q_status }}">
                    @endif --}}
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tampilkan</span>
                            </div>
                            <select class="form-control" name="row" id="table-row">
                                {{-- <option value="10" {{ ($q_row == '10') ? 'selected' : '' }}>10</option>
                                <option value="25" {{ ($q_row == '25') ? 'selected' : '' }}>25</option>
                                <option value="50" {{ ($q_row == '50') ? 'selected' : '' }}>50</option>
                                <option value="100" {{ ($q_row == '100') ? 'selected' : '' }}>100</option> --}}
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
                @if (session('result_r'))
                    <div class="alert alert-success">
                        <b>Respon:</b> Permintaan Deposit Diterima.<br>
                        <b>ID Deposit:</b> <br>
                        <b>Metode:</b><br>
                        <b>Jumlah Transfer:</b> Rp  << Ini nominal yang harus di transfer, ikutin semua nominal nya jangan sampai salah <br>
                        <b>Saldo Diterima:</b> Rp <br><br>
                        
                    </div>
                @endif
                @php
                    session()->forget('result_r');
                @endphp
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-uppercase">
                                <th>ID</th>
                                <th>Pembayaran</th>
                                <th>Jenis</th>
             
                                <th>Jumlah Transfer</th>
                                <th>Status</th>
                                <th>Tgl. Deposit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deposits as $depo)
                                <tr>
                                    <td>{{$depo->id}}</td>
                                    <td>{{$depo->method_name}}</td>
                                    <td>{{$depo->type_payment}}</td>
                                    <td>Rp. {{number_format($depo->amount)}}</td>
                                    <td>{{$depo->status}}</td>
                                    <td>{{$depo->created_at->format('d-m-Y')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                <!-- Modal body content here -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
