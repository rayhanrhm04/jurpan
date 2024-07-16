@extends('layouts.vertical', ['title' => 'Pemesanan', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Pemesanan', 'page_title' => 'Pemesanan Single'])

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-cart-arrow-up me-1"></i>Pesanan Baru</h5>
            <div class="card-body" id="ajax-result">
                @if (session('result_r'))
                <div class="alert alert-success">
                    <b>Respon: </b>Berhasil Melakukan Pemesanan<br>
                    <b>Pesan:</b><br>
                    <ul class="mb-0">
                        <li>
                            <span class="text-break"><b>Layanan: </b> by Juraganpanel.com</span>
                        </li>
                        <li>
                            <span class="text-break"><b>Target: </b></span>
                        </li>
                        <li>
                            <span class="text-break"><b>Jumlah: </b></span>
                        </li>
                        <li>
                            <span class="text-break"><b>Harga: </b>Rp</span>
                        </li>
                    </ul>
                </div>
                @php
                    session()->forget('result_r');
                @endphp
                @endif
                <form method="POST">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="general" role="tabpanel">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('all')" class="btn btn-outline-dark btn-block mb-4 btn-filter-category" data-category="all"><i class="fa fa-list mr-2"></i> Semua Kategori</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('instagram')" class="btn btn-outline-dark btn-block mb-4 btn-filter-category" data-category="instagram"><i class="mdi mdi-instagram mr-2"></i> Instagram</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('facebook')" class="btn btn-outline-dark btn-block mb-4 btn-filter-category" data-category="facebook"><i class="mdi mdi-facebook mr-2"></i> Facebook</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('youtube')" class="btn btn-outline-dark btn-block mb-3 btn-filter-category" data-category="youtube"><i class="mdi mdi-youtube mr-2"></i> Youtube</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('twitter')" class="btn btn-outline-dark btn-block mb-3 btn-filter-category" data-category="twitter"><i class="mdi mdi-twitter mr-2"></i> Twitter</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('spotify')" class="btn btn-outline-dark btn-block mb-3 btn-filter-category" data-category="spotify"><i class="mdi mdi-spotify mr-2"></i> Spotify</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('tiktok')" class="btn btn-outline-dark btn-block mb-3 btn-filter-category" data-category="tiktok"><i class="mdi mdi-music mr-2"></i> Tiktok</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('linkedin')" class="btn btn-outline-dark btn-block mb-3 btn-filter-category" data-category="linkedin"><i class="mdi mdi-linkedin mr-2"></i> Linkedin</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('google')" class="btn btn-outline-dark btn-block mb-3 btn-filter-category" data-category="google"><i class="mdi mdi-linkedin mr-2"></i> Google</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('telegram')" class="btn btn-outline-dark btn-block mb-3 btn-filter-category" data-category="telegram"><i class="mdi mdi-telegram mr-2"></i> Telegram</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('web')" class="btn btn-outline-dark btn-block mb-3 btn-filter-category" data-category="web"><i class="fa fa-globe mr-2"></i> Web Traffic</button>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <button type="button" onclick="categoryFilter('other')" class="btn btn-outline-dark btn-block mb-3 btn-filter-category" data-category="other"><i class="fa fa-list-alt mr-2"></i> Other</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select class="select2 form-control" id="category">
                                    <option value="0">Pilih...</option>
                                </select>
                            </div>
                        </div>
                        <div class="tab-pane" id="favorite" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select class="select2 form-control" id="category_fav">
                                    <option value="0">Pilih...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Layanan <span class="text-danger">*</span></label>
                        <select class="select2 form-control" name="service" id="service">
                            <option value="0">Pilih Kategori</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <div class="form-control" style="white-space: pre-wrap;" id="description" readonly>-</div>
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
                            <label class="form-label">Waktu Rata-Rata <span class="ml-1 mr-1 fa fa-exclamation-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title=" Waktu rata-rata berdasarkan pesanan yang telah selesai."></span></label>
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
                        <button type="reset" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-refresh me-1"></i>Ulangi</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-cart-arrow-up me-1"></i>Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-information-outline me-1"></i>Informasi</h5>
            <div class="card-body">
                <b>Cara melakukan pemesanan:</b>
                <ul>
                    <li>Pilih <em><b>Kategori</b></em> yang Anda inginkan.</li>
                    <li>Pilih <em><b>Layanan</b></em> yang Anda inginkan.</li>
                    <li>Input <em><b>Jumlah Pesanan</b></em> yang Anda inginkan.</li>
                    <li>Input <em><b>Target</b></em> pesanan yang sesuai.</li>
                </ul>
                <br>
                <b>Penting!</b>
                <ul>
                    <li>Mohon untuk tidak melakukan pesanan dengan target yang sama jika pesanan sebelumnya belum selesai diproses, agar pesanan lancar dan tidak bermasalah.</li>
                    <li>Jika Anda mendapat pesan gagal saat melakukan pemesanan, silakan informasikan layanan tersebut melalui <em><b><a href="{{ url('ticket/new') }}">Tiket</a></b></em> atau hubungi Admin.</li>
                    {{-- <li>Silahkan liat format target pemesenan  <em><b><a href="{{ url('sitemap/5') }}">disini</a></b></em>  --}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
