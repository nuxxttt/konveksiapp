<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
    <style>
        .side-nav .side-nav-link{
            color: rgb(236, 236, 236);
        }
    </style>

    <!-- Brand Logo Light -->
    <a href="{{ route("any", "index") }}" class="logo logo-light">
        <span class="logo-lg">
            @if(isset($settings) && $settings->logo)
                <img src="{{ asset($settings->logo) }}" alt="dark logo">
            @else
                <img src="{{ asset('images/logo.png') }}" alt="dark logo">
            @endif
        </span>
        <span class="logo-sm">
            @if(isset($settings) && $settings->logo)
                <img src="{{ asset($settings->logo) }}" alt="small logo">
            @else
                <img src="{{ asset('images/logo-sm.png') }}" alt="small logo">
            @endif
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route("any", "index") }}" class="logo logo-dark">
        <span class="logo-lg">
            @if(isset($settings) && $settings->logo)
                <img src="{{ asset($settings->logo) }}" alt="dark logo">
            @else
                <img src="{{ asset('images/logo.png') }}" alt="dark logo">
            @endif
        </span>
        <span class="logo-sm">
            @if(isset($settings) && $settings->logo)
                <img src="{{ asset($settings->logo) }}" alt="small logo">
            @else
                <img src="{{ asset('images/logo-sm.png') }}" alt="small logo">
            @endif
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            @php
                $role = auth()->user()->role;
            @endphp
        <li class="side-nav-item">
            <a href="{{ route("any", "$role/pembelian/create") }}" class="side-nav-link">
                <i class="  ri-shopping-cart-line"></i>
                <span> Input Barang</span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{ route("any", "$role/penjualan/create") }}" class="side-nav-link">
                <i class="  ri-shopping-bag-line"></i>
                <span> Penjualan </span>
            </a>
        </li>
            <li class="side-nav-item">
                <a href="{{ route("any", "index") }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false"
                    aria-controls="sidebarCharts" class="side-nav-link">
                    <i class="ri-donut-chart-fill"></i>
                    <span> Master Data </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ["$role", 'barang']) }}">Barang</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ["$role", 'category']) }}">Kategori</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ["$role", 'mitra']) }}">Mitra</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ["$role", 'rak']) }}">Rak</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ["$role", 'satuan']) }}">Satuan</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ["$role", 'supplier']) }}">Supplier</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route("any", "$role/distribusi") }}" class="side-nav-link">
                    <i class=" ri-p2p-fill"></i>
                    <span> Distribusi Kain Mitra </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route("any", "$role/pengemasan/create") }}" class="side-nav-link">
                    <i class="  ri-gift-line"></i>
                    <span> Pengemasan </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route("any", "$role/rak") }}" class="side-nav-link">
                    <i class=" ri-box-3-line "></i>
                    <span> Rak</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route("any", "$role/produksi") }}" class="side-nav-link">
                    <i class=" ri-treasure-map-line"></i>
                    <span> Proses Produksi</span>
                </a>

            </li>
            <li class="side-nav-item">
                <a href="{{ route("any", "$role/konversi") }}" class="side-nav-link">
                    <i class=" ri-calculator-line "></i>
                    <span> Konversi</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route("any", "$role/pemotongan") }}" class="side-nav-link">
                    <i class="ri-scissors-line"></i>
                    <span> Pemotongan</span>
                </a>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarChartss" aria-expanded="false"
                        aria-controls="sidebarChartss" class="side-nav-link">
                        <i class="ri-history-line"></i>
                        <span> Histori </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarChartss">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('second', ["$role", 'penjualan']) }}">Penjualan</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ["$role", 'pembelian']) }}">Pembelian</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ["$role", 'pengemasanhistory']) }}">Pengemasan</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ["$role", 'distribusihistory']) }}">Distribusi Kain Mitra</a>
                            </li>
                            <li>
                                <a href="{{ route('second', ["$role", 'produksihistory']) }}">Produksi</a>
                            </li>

                        </ul>
                    </div>
                </li>
            </li>
            {{-- <li class="side-nav-item">
                <a href="{{ route("any", "$role/peserta") }}" class="side-nav-link">
                    <i class=" ri-user-3-line"></i>
                    <span> Perserta </span>
                </a>
            </li> --}}
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
