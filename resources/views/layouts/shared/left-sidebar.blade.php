<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('dashboard') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="/images/jurpan.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/images/jp.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('dashboard') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/images/jurpan.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end">9+</span>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (Auth::check() && Auth::user()->role === 'user')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPemesanan" aria-expanded="false" aria-controls="sidebarPemesanan" class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span>Pemesanan</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPemesanan">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('order') }}">Pemesanan</a>
                        </li>
                        <li>
                            <a href="{{ route('historyorder') }}">Riwayat Pesanan</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDeposit" aria-expanded="false" aria-controls="sidebarDeposit" class="side-nav-link">
                    <i class="ri-donut-chart-fill"></i>
                    <span>Deposit</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarDeposit">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('deposit') }}">Deposit Baru</a>
                        </li>
                        <li>
                            <a href="{{ route('historydeposit') }}">Riwayat Deposit</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayanan" aria-expanded="false" aria-controls="sidebarLayanan" class="side-nav-link">
                    <i class="ri-survey-line"></i>
                    <span>Layanan</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayanan">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('services') }}">Daftar Harga</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarVoucher" aria-expanded="false" aria-controls="sidebarVoucher" class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span>Tiket</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarVoucher">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('ticket.create') }}">Buat Tiket</a>
                        </li>
                        <li>
                            <a href="{{ route('ticket.list') }}">Riwayat Tiket</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
        @else
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarDeposit" aria-expanded="false" aria-controls="sidebarDeposit" class="side-nav-link">
                <i class="ri-donut-chart-fill"></i>
                <span>Deposit</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarDeposit">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('report-deposit') }}">Laporan Deposit</a>
                    </li>
                    <li>
                        <a href="{{ route('detail-deposit') }}">Detail Deposit</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarPemesanan" aria-expanded="false" aria-controls="sidebarPemesanan" class="side-nav-link">
                <i class="ri-pages-line"></i>
                <span>Pemesanan</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarPemesanan">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('data-order') }}">Data Pemesanan</a>
                    </li>
                    <li>
                        <a href="{{ route('historyorder') }}">Riwayat Pesanan</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarPemesanan" aria-expanded="false" aria-controls="sidebarPemesanan" class="side-nav-link">
                <i class="ri-user-line"></i>
                <span>User</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarPemesanan">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('buat-user') }}">Buat User</a>
                    </li>
                    <li>
                        <a href="{{ route('status-user') }}">Status User</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarTicket" aria-expanded="false" aria-controls="sidebarTicket" class="side-nav-link">
                <i class="ri-ticket-line"></i>
                <span>Tiket</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarTicket">
                <ul class="side-nav-second-level">
                    <!-- Daftar Tiket -->
                    <li>
                        <a href="{{ route('admin.ticket.list') }}">Daftar Tiket</a>
                    </li>
                    <!-- Reply Tiket (Admin menjawab tiket) -->
                    {{-- <li>
                        <a href="{{ route('admin.ticket.edit', ['ticket' => 1]) }}">Reply Tiket</a>
                    </li> --}}
                </ul>
            </div>
        </li>
        
        @endif
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
