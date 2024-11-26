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
                            <option value="0" >Pilih Kategori</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        {{-- <textarea name="desc" id="description" cols="30" rows="10" readonly></textarea> --}}
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

                    <div class="mb-3 d-none" id="input_custom_comments">
                        <label class="form-label">Komentar <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="custom_comments" id="custom_comments" placeholder="*Pisahkan komentar dengan Enter."></textarea>
                        <small class="text-danger" id="custom_comments_alert"></small>
                    </div>

                    <div class="mb-3 d-none" id="input_custom_link">
                        <label class="form-label">Link Post <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="custom_link" id="custom_link">
                    </div>

                    <div class="mb-0 float-end">
                        <button type="reset" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-refresh me-1"></i> Ulangi</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-cart-arrow-up me-1"></i> Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-information-outline me-1"></i> Informasi</h5>
            <div class="card-body">
                <b>Cara melakukan pemesanan:</b>
                <ul>
                    <li>Pilih <b>Kategori</b> yang Anda inginkan.</li>
                    <li>Pilih <b>Layanan</b> yang Anda inginkan.</li>
                    <li>Input <b>Jumlah Pesanan</b> yang Anda inginkan.</li>
                    <li>Input <b>Target</b> pesanan yang sesuai.</li>
                </ul>
                <br>
                <b>Penting!</b>
                <ul>
                    <li>Jangan melakukan pesanan dengan target yang sama sebelum pesanan sebelumnya selesai diproses.</li>
                    <li>Jika pesanan gagal, informasikan melalui <b><a href="{{ url('ticket/new') }}">Tiket</a></b> atau hubungi Admin.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#category').change(function() {
            var category_id = $('#category').val();
            $('#service').empty();
            $.ajax({
                url: `{{route('ajax.layanan')}}`,
                type: 'GET',
                data: {
                    category_id: category_id
                },
                success: function (data) {
                    data.forEach(function (service) {
                        $('#service').append(`<option value="${service.id}">${service.service_name}</option>`);
                    });
                },
                error: function() {
                    alert('Error');
                }
            })
            // var category_id = $('#description').val();
            $('#description').empty();
            $.ajax({
                url: `{{route('ajax.layanan')}}`,
                type: 'GET',
                data: {
                    category_id: category_id
                },
                success: function (data) {
                    data.forEach(function (service) {
                        // $('#service').append(`<option value="${service.id}">${service.service_name}</option>`);
                        $('#description').append(`<div value="${service.id}">${service.description}</div>`);
                    });
                },
                error: function() {
                    alert('Error');
                }
            })

            $.ajax({
                url: `{{route('ajax.layanan')}}`,
                type: 'GET',
                data: {
                    category_id: category_id
                },
                success: function (data) {
                    data.forEach(function (service) {
                        $('#min-amount').append(` <input type="text" class="form-control" value="${service.id}">`);
                        // $('#max-amount').append(`<div value="${service.id}">${service.max}</div>`);
                    });
                },
                error: function() {
                    alert('Error');
                }
            })

            $.ajax({
                url: `{{route('ajax.layanan')}}`,
                type: 'GET',
                data: {
                    category_id: category_id
                },
                success: function (data) {
                    data.forEach(function (service) {
                        // $('#service').append(`<option value="${service.id}">${service.service_name}</option>`);
                        $('#price').append(` <input type="text" class="form-control" value="${service.price}">`);
                        // $('#max-amount').append(`<div value="${service.id}">${service.max}</div>`);
                    });
                },
                error: function() {
                    alert('Error');
                }
            })
        });

        // $('#service').change(function() {
        // var service = $('#service').val();
        // $.ajax({
        //     type: "POST",
        //     url: '{{route('ajax.layanan')}}',
        //     data: "service=" + service + "&csrf_token=<?= csrf_token(); ?>",
        //     dataType: "json",
        //     success: function(data) {
        //         let description = data.description;
        //         description.split('\n').join('<br>');

        //         $('#description').html(description);
        //         $('#average').val(data.average);
        //         $('#min-amount').val(data.min);
        //         $('#max-amount').val(data.max);
        //         $('#price').val(data.price);
        //         if (data.form_type == 'custom_comments') {
        //             $('#input_custom_comments').removeClass('d-none');
        //             $('#input_custom_link').addClass('d-none');
        //             $('#quantity').attr('readonly', true);
        //             $('#quantity').val('');
        //             $('#custom_comments').val('');
        //             $('#custom_link').val('');
        //             $('#target').val('');
        //             $('#total-price').val(0)
        //         } else if (data.form_type == 'custom_link') {
        //             $('#input_custom_comments').addClass('d-none');
        //             $('#input_custom_link').removeClass('d-none');
        //             $('#quantity').removeAttr('readonly');
        //             $('#quantity').val('');
        //             $('#custom_comments').val('');
        //             $('#custom_link').val('');
        //             $('#target').val('');
        //             $('#total-price').val(0)
        //         } else {
        //             $('#input_custom_comments').addClass('d-none');
        //             $('#input_custom_link').addClass('d-none');
        //             $('#quantity').removeAttr('readonly');
        //             $('#quantity').val('');
        //             $('#custom_comments').val('');
        //             $('#custom_link').val('');
        //             $('#target').val('');
        //             $('#total-price').val(0)
        //         }
        //     },
        //     error: function() {
        //         $('#ajax-result').html(
        //             '<font color="red">Terjadi kesalahan! Silahkan refresh halaman.</font>'
        //         );
        //     }
        // }).done(function(e) {
        //     form_ajax = e.form;
        //     $('#quantity').keyup(function() {
        //         var service = $('#service').val();
        //         var quantity = $('#quantity').val();
        //         total_price(service, quantity);
        //     });
        

        $.ajax({
            url: 'api.php',
            type: 'GET',
            data: {
                menu: 'services'
            },
            success: function (data) {
                data.data.forEach(function (service) {
                    $('#services').append(`<option value="${service.id}">${service.name}</option>`);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });

        $('form').submit(function (e) {
            e.preventDefault();
            var service = $('#services').val();
            var target = $('#target').val();
            var quantity = $('#quantity').val();

            $.ajax({
                url: 'api.php',
                type: 'POST',
                data: {
                    menu: 'newOrder',
                    service: service,
                    target: target,
                    quantity: quantity
                },
                success: function (data) {
                    $('#hasil').text(data.data.id);
                    alert('Berhasil');
                },
                error: function (error) {
                    console.log(error);
                    alert('Gagal');
                }
            });
        });

        $('#cek').click(function () {
            var order_id = $('#order_id').val();
            $.ajax({
                url: 'api.php',
                type: 'POST',
                data: {
                    menu: 'checkStatus',
                    order_id: order_id
                },
                success: function (data) {
                    alert(data.data.status);
                },
                error: function (error) {
                    console.log(error);
                    alert('Gagal');
                }
            });
        });

    });

</script>


@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
