@extends('layouts.vertical', ['title' => 'Pemesanan', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Pemesanan', 'page_title' => 'Riwayat Pemesanan'])


<div class="row">
    <div class="col-md-12">
        <div class="btn-group flex-wrap mb-3">
            <a href="{{ url('order/history') }}" class="btn btn-primary">Semua</a>
            <a href="{{ url('order/history?status=pending') }}" class="btn btn-primary">Pending</a>
            <a href="{{ url('order/history?status=processing') }}" class="btn btn-primary">Processing</a>
            <a href="{{ url('order/history?status=success') }}" class="btn btn-primary">Success</a>
            <a href="{{ url('order/history?status=error') }}" class="btn btn-primary">Error</a>
            <a href="{{ url('order/history?status=partial') }}" class="btn btn-primary">Partial</a>
        </div>
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-history me-1"></i>Riwayat Pesanan</h5>
            <div class="card-body">
                <div class="alert alert-warning">
                    <span class="font-size-16 fw-bold mb-0">Informasi Untuk Layanan Refill</span>
                    <ul class="mb-0">
                        <li>Tombol Refill hanya dapat digunakan untuk layanan yang memiliki label ♻️ pada nama layanannya.</li>
                        <li>Gunakan tombol Refill ini hanya ketika pesanan Anda mengalami drop.</li>
                        <li>Proses Refill mungkin membutuhkan waktu -+24 jam.</li>
                        <li>Anda dapat menggunakan tombol Refill kembali setelah 24 jam dari terakhir kali Anda menggunakannya.</li>
                        <li>Jika saat klik tombol refill, responnya adalah "Refill not allowed" artinya tombol refill belum bisa digunakan dan Anda bisa coba klik tombol refill kembali secara berkala.</li>
                        <li>Anda harus menunggu maksimal selama 3 hari setelah pesanan Anda Success / Selesai untuk dapat menggunakan tombol Refill.</li>
                    </ul>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        <strong>Success: </strong>{{ session('success') }}
                    </div>
                @endif
                <form method="get" class="row">
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tampilkan</span>
                            </div>
                            <select class="form-control" name="row" id="table-row">
                                {{-- <option value="10" {{ request()->get('row') == '10' ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request()->get('row') == '25' ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request()->get('row') == '50' ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request()->get('row') == '100' ? 'selected' : '' }}>100</option> --}}
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text">baris.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date" id="table-start-date" value="{{ request()->get('start_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">sampai</span>
                            </div>
                            <input type="date" class="form-control" name="end_date" id="table-end-date" value="{{ request()->get('end_date') }}">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" id="table-search" value="{{ request()->get('search') }}" placeholder="Cari...">
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
                                <th>Kategori</th>
                                <th>Layanan</th>
                                <th>Target</th>
                                <th>Harga Layanan</th>
                                <th>Jumlah</th>
                                <th>Total Order</th>
                                <th>Status</th>
                                <th>Tgl. Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->category?->name}}</td>
                                    <td>{{$order->service?->service_name}}</td>
                                    <td>{{$order->target}}</td>
                                    <td>Rp. {{number_format($order->price)}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>Rp. {{number_format($order->amount)}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at->format('d-m-Y')}}</td>
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
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
