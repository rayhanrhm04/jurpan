@extends('layouts.vertical', ['title' => 'Deposit', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'Deposit', 'page_title' => 'Deposit Baru'])

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-wallet-plus-outline me-1"></i>Deposit Baru</h5>
            <div class="card-body">
                <form action="{{route('deposit.store')}}" method="POST">
                    @csrf
                    {{-- <div class="mb-3">
                        <label class="form-label">Jenis Permintaan <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="otomatis" value="auto">
                            <label class="form-check-label" for="otomatis">Otomatis</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="manual" value="manual">
                            <label class="form-check-label" for="manual">Manual</label>
                        </div>
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Jenis Pembayaran <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="bank" value="bank">
                            <label class="form-check-label" for="bank">Bank</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="ewallet" value="ewallet">
                            <label class="form-check-label" for="ewallet">E-Wallet / Scan QRIS / All Bank ( Virtual Account )</label>
                        </div>
                        {{-- <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="pulsa" value="pulsa">
                            <label class="form-check-label" for="pulsa">Pulsa</label>
                        </div> --}}
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>
                        <select class="form-control" name="method" id="method">
                            <option value="0">Pilih Jenis Pembayaran & Permintaan</option>
                        </select>
                        <input type="hidden" id="method_name" name="method_name">
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Minimal Deposit</label>
                        <div class="input-group">
                            <div class="input-group-text">Rp.</div>
                            <input type="text" class="form-control" id="min-amount" value="0" readonly>
                        </div>
                    </div> --}}
                    <div class="mb-3 d-none" id="phone">
                        <label class="form-label">Nomor Pengirim</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="phone" id="phone_number" placeholder="08xxx">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Jumlah Deposit <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text">Rp.</div>
                                <input type="number" class="form-control" name="amount" id="post-amount" placeholder="50000">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Saldo Diterima</label>
                            <div class="input-group">
                                <div class="input-group-text">Rp.</div>
                                <input type="text" class="form-control" id="amount" value="0" readonly>
                            </div>
                        </div>
                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary waves-effect waves-light float-end"><i class="mdi mdi-wallet-plus-outline me-1"></i>Deposit</button>
                            <button type="reset" class="btn btn-danger waves-effect waves-light float-end me-2"><i class="mdi mdi-refresh me-1"></i>Ulangi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-information-outline me-1"></i>Informasi</h5>
            <div class="card-body">
                <strong>Cara Melakukan Deposit Baru :</strong>
                <ul>
                    <li>Pilih <em>Jenis Permintaan</em>.</li>
                    <li>Pilih <em>Jenis Pembayaran</em>.</li>
                    <li>Pilih <em>Metode Pembayaran</em>.</li>
                    <li>Input <em>Jumlah Deposit</em> yang Anda inginkan.</li>
                    <li>Transfer Pembayaran sesuai dengan nominal yang tertera.</li>
                    <li>Saldo akan otomatis bertambah dalam beberapa menit apabila Anda menggunakan <em>Jenis Permintaan</em> <b><em>OTOMATIS</em></b>.</li>
                </ul>
                <strong>Penting !</strong>
                <ul>
                    <li>Kami berhak menghapus atau memblokir akun Anda apabila terbukti melakukan kecurangan pada Deposit.</li>
                    <li>Jika menggunakan <em>Jenis Permintaan</em> <b><em>MANUAL</em></b>, harap konfirmasi ke Admin agar Permintaan Deposit segera diterima.</li>
                    <li>Jika Deposit belum masuk silahkan hubungi whatsapp kami, <a href="{{ url('whatsapp') }}" class="text-colored">clicknow</a>.</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Referensi elemen
            const paymentInputs = document.querySelectorAll('input[name="payment"]');
            const methodSelect = document.getElementById('method');
            const phoneField = document.getElementById('phone');

            // Data metode pembayaran berdasarkan jenis pembayaran
            const methods = {
                bank: [
                    { value: '2', text: 'Bank BRI' },
                    { value: '3', text: 'Bank CIMB' },
                    { value: '4', text: 'Bank BNI' },
                    { value: '5', text: 'Bank Mandiri' },
                    { value: '6', text: 'Bank Maybank' },
                    { value: '7', text: 'Bank Permata' },
                    { value: '8', text: 'Bank Danamon' },
                    { value: '9', text: 'Bank BNI' },
                    { value: '10', text: 'Bank BSI' },
                    { value: '11', text: 'Bank BNC (Neo Commerce)' },
                    { value: '10', text: 'Bank BSI' },
                    
                ],
                ewallet: [
                    { value: '13', text: 'DANA' },
                    { value: '11', text: 'QRIS (All Bank)' }
                ],
                pulsa: [
                    { value: 'telkomsel', text: 'Pulsa Telkomsel' },
                    { value: 'xl', text: 'Pulsa XL' },
                    { value: 'indosat', text: 'Pulsa Indosat' }
                ]
            };

            // Event listener untuk input jenis pembayaran
            paymentInputs.forEach(input => {
                input.addEventListener('change', function () {
                    // Kosongkan metode pembayaran
                    methodSelect.innerHTML = '<option value="0">Pilih Metode Pembayaran</option>';

                    // Tambahkan metode pembayaran berdasarkan pilihan
                    if (methods[this.value]) {
                        methods[this.value].forEach(method => {
                            const option = document.createElement('option');
                            option.value = method.value;
                            option.text = method.text;
                            methodSelect.appendChild(option);
                        });
                    }

                    // Tampilkan atau sembunyikan input nomor telepon untuk jenis pulsa
                    if (this.value === 'pulsa') {
                        phoneField.classList.remove('d-none');
                    } else {
                        phoneField.classList.add('d-none');
                    }
                });
            });
        });

        document.getElementById("method").addEventListener("change", function() {
            const methodName = this.options[this.selectedIndex].text;
            const methodSelect = document.getElementById('method_name').value = methodName;
        });
    </script>
@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
@endsection
