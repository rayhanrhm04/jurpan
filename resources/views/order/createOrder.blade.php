@extends('layouts.vertical', ['title' => 'Pemesanan', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Pemesanan', 'page_title' => 'Pemesanan Single'])

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-cart-arrow-up me-1"></i> Pesanan Baru</h5>
            <div class="card-body" id="ajax-result">
                @if (session('result_r'))
                <div class="alert alert-success">
                    <b>Respon: </b>Berhasil Melakukan Pemesanan<br>
                    <b>Pesan:</b><br>
                    <ul class="mb-0">
                        <li><b>Layanan: </b>by Juraganpanel.com</li>
                        <li><b>Target: </b></li>
                        <li><b>Jumlah: </b></li>
                        <li><b>Harga: </b>Rp</li>
                    </ul>
                </div>
                @php session()->forget('result_r'); @endphp
                @endif

                <form method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="select2 form-control" id="category">
                            <option value="0">Pilih...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Layanan <span class="text-danger">*</span></label>
                        <select class="select2 form-control" name="service" id="service">
                            <option value="0">Pilih Kategori</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <div class="form-control" style="white-space: pre-wrap;" id="description" name="desc" readonly>-</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Minimal Pesanan</label>
                            <input type="text" class="form-control" value="0" id="min-amount" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Maksimal Pesanan</label>
                            <input type="text" class="form-control" value="0" id="max-amount" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Harga / 1000</label>
                            <div class="input-group">
                                <div class="input-group-text">Rp</div>
                                <input type="text" class="form-control" value="0" id="price" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Target <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="target" id="target">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Pesanan</label>
                            <input type="number" class="form-control" name="quantity" id="quantity">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Waktu Rata-Rata <span class="ml-1 mr-1 fa fa-exclamation-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Waktu rata-rata berdasarkan pesanan yang telah selesai."></span></label>
                            <input type="text" class="form-control" name="average" id="average" value="-" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Harga</label>
                            <div class="input-group">
                                <div class="input-group-text">Rp</div>
                                <input type="text" class="form-control" value="0" id="total-price" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="mb-0 float-end">
                        <button type="reset" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-refresh me-1"></i> Ulangi</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-cart-arrow-up me-1"></i> Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#category').change(function () {
            var category_id = $('#category').val();
            $('#service').empty();
            $('#description').empty();
            $('#min-amount').val('0');
            $('#max-amount').val('0');
            $('#price').val('0');
            $('#average').val('-');

            // Memuat layanan
            $.ajax({
                url: `{{route('ajax.layanan')}}`,
                type: 'GET',
                data: { category_id: category_id },
                success: function (data) {
                    data.forEach(function (service) {
                        $('#service').append(`<option value="${service.id}">${service.service_name}</option>`);
                        $('#description').append(`<div>${service.description}</div>`);
                    });
                },
                error: function () {
                    alert('Error loading services');
                }
            });

            // Memuat min, max, dan price
            $.ajax({
                url: `{{route('ajax.amountAndPrice')}}`,
                type: 'GET',
                data: { category_id: category_id },
                success: function (data) {
                    $('#min-amount').val(data.min);
                    $('#max-amount').val(data.max);
                    $('#price').val(data.price);
                    $('#average').val(data.average);
                },
                error: function () {
                    alert('Error loading amount and price');
                }
            });
        });
    });
</script>
@endsection
