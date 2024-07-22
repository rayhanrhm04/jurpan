<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('any', 'index') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="/images/jurpan.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/images/jp.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('any', 'index') }}" class="logo logo-dark">
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
                <a href="{{ route('any', 'index') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end">9+</span>
                    <span> Dashboard </span>
                </a>
            </li>

            
            {{-- <li class="side-nav-item">
                <a href="{{ route('any', 'index') }}" class="side-nav-link">
                    <i class="bi bi-people-fill"></i>
                    <span class="badge bg-success float-end"></span>
                    <span> Pengguna </span>
                </a>
            </li> --}}

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages"
                    class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Pemesanan </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['order', 'createOrder']) }}">Pemesanan Single</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'contact-list']) }}">Pemesanan Massal</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['order', 'historyOrder']) }}">Riwayat Pesanan</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'timeline']) }}">Riwayat Refill</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'invoice']) }}">Layanan Favorit</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false"
                    aria-controls="sidebarCharts" class="side-nav-link">
                    <i class="ri-donut-chart-fill"></i>
                    <span> Deposit </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['deposit', 'createDepo']) }}">Deposit Baru</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['deposit', 'historyDepo']) }}">Riwayat Deposit</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('second', ['charts', 'sparklines']) }}">Sparkline Charts</a>
                        </li> --}}
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-survey-line"></i>
                    <span> Layanan </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['services', 'price']) }}">Daftar Harga</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['forms', 'advanced']) }}">Monitoring</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['forms', 'validation']) }}">Dokumentasi API</a>
                        </li>
                     
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false"
                    aria-controls="sidebarTables" class="side-nav-link">
                    <i class="ri-table-line"></i>
                    <span> Voucher </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTables">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['voucher', 'redeem']) }}">Reedem Voucher</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['voucher', 'historyvoucher']) }}">Riwayat Voucher</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('second', ['tables', 'editable']) }}">Editable Tables</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['tables', 'responsive']) }}">Responsive Table</a>
                        </li> --}}
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps"
                    class="side-nav-link">
                    <i class="ri-map-pin-line"></i>
                    <span> Sitemap </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['maps', 'google']) }}">Kontak</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['maps', 'vector']) }}">Ketentuan Layanan</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['maps', '']) }}">Pertanyaan Umum</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['maps', '']) }}">Jam Kerja</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['maps', '']) }}">Target Pesanan</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['maps', '']) }}">Keuntungan</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false"
                    aria-controls="sidebarMultiLevel" class="side-nav-link">
                    <i class="ri-share-line"></i>
                    <span> Log </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="javascript: void(0);">Level 1.1</a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false"
                                aria-controls="sidebarSecondLevel">
                                <span> Level 1.2 </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Item 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false"
                                aria-controls="sidebarThirdLevel">
                                <span> Level 1.3 </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false"
                                            aria-controls="sidebarFourthLevel">
                                            <span> Item 2 </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="side-nav-forth-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> --}}

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->