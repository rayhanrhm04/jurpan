@extends('layouts.vertical', ['title' => 'User', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared.page-title', ['sub_title' => 'User', 'page_title' => 'Buat User'])

<div id="modal-result"></div>
<div class="card">
    <div class="card-header">
        <h5><i class="mdi mdi-account-plus-outline me-1"></i> Tambah User Baru</h5>
    </div>
    <div class="card-body">
        <form id="form">
            <input type="hidden" name="csrf_token" value="">

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan email pengguna" required>
                <div class="form-text">Contoh: user@example.com</div>
            </div>

            <!-- Full Name -->
            <div class="mb-3">
                <label class="form-label" for="full_name">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Masukkan nama lengkap pengguna" required>
                <div class="form-text">Pastikan nama sesuai dengan identitas resmi.</div>
            </div>

            <!-- Username -->
            <div class="mb-3">
                <label class="form-label" for="username">Username <span class="text-danger">*</span></label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Masukkan username unik" required>
                <div class="form-text">Username harus unik dan minimal 4 karakter.</div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password" required>
                <div class="form-text">Password minimal 8 karakter dengan kombinasi huruf dan angka.</div>
            </div>

            <!-- Balance -->
            <div class="mb-3">
                <label class="form-label" for="balance">Saldo Awal</label>
                <input type="number" id="balance" class="form-control" name="balance" value="0" min="0" placeholder="Masukkan saldo awal">
                <div class="form-text">Saldo awal pengguna (opsional).</div>
            </div>

            <!-- Timezone -->
            <div class="mb-3">
                <label class="form-label" for="timezone">Zona Waktu</label>
                <select id="timezone" class="form-control" name="timezone">
                    <option value="Asia/Jakarta">Asia/Jakarta - GMT+07:00 (WIB)</option>
                    <option value="Asia/Makassar">Asia/Makassar - GMT+08:00 (WITA)</option>
                    <option value="Asia/Jayapura">Asia/Jayapura - GMT+09:00 (WIT)</option>
                    <option value="UTC">UTC</option>
                </select>
                <div class="form-text">Pilih zona waktu pengguna.</div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-danger btn-sm me-2">
                    <i class="mdi mdi-refresh me-1"></i> Ulangi
                </button>
                <button type="button" onclick="" class="btn btn-primary btn-sm">
                    <i class="mdi mdi-plus-circle-outline me-1"></i> Tambah
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
