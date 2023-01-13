<a href="/dashboard" class="brand-link">
    <img src="{{ asset('assets/dist/img/sri2.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text">PT. SAKAE RIKEN IDN</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- SidebarSearch Form -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-header"></li>

            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link @if (request()->routeIs('dashboard*')) active @else '' @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Menu Utama
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('master') }}"
                    class="nav-link @if (request()->routeIs('master*')) active @else '' @endif">
                    <i class="nav-icon fas fa-dolly-flatbed"></i>
                    <p>
                        Master Data Part
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('msterkensa') }}"
                    class="nav-link @if (request()->routeIs('msterkensa*')) active @else '' @endif">
                    <i class="nav-icon fas fa-clipboard-check"></i>
                    <p>
                        Master Data Kensa
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('stok') }}" class="nav-link @if (request()->routeIs('stok*')) active @else '' @endif">
                    <i class="nav-icon fas fa-warehouse"></i>
                    <p>
                        Stock
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('racking_t') }}"
                    class="nav-link @if (request()->routeIs('racking_t*')) active @else '' @endif">
                    <i class="nav-icon fas fa-wrench"></i>
                    <p>
                        Racking
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('unracking_t') }}"
                    class="nav-link @if (request()->routeIs('unracking_t*')) active @else '' @endif">
                    <i class="nav-icon fas fa-people-carry"></i>
                    <p>
                        Unracking
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('kensa*') ? 'active menu-open' : '' }}">
                <a href="#" class="nav-link {{ Route::is('kensa*') ? 'active menu-open' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Kensa
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('kensa.utama') }}"
                            class="nav-link @if (request()->routeIs('kensa.utama')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Menu Utama</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kensa') }}"
                            class="nav-link @if (request()->routeIs('kensa')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Kensa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kensa.tambah') }}"
                            class="nav-link @if (request()->routeIs('kensa.tambah')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Input Inspeksi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kensa.printKanban') }}"
                            class="nav-link @if (request()->routeIs('kensa.printKanban')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Print Kanban</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kensa.pengiriman') }}"
                            class="nav-link @if (request()->routeIs('kensa.pengiriman')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Pengiriman</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('laporan*') ? 'active menu-open' : '' }}">
                <a href="#" class="nav-link {{ Route::is('laporan*') ? 'active menu-open' : '' }}">
                    <i class="nav-icon fas fa-file-excel"></i>
                    <p>
                        Laporan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('laporan') }}"
                            class="nav-link @if (request()->routeIs('laporan')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Racking - Unracking</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('laporan.kensa') }}"
                            class="nav-link @if (request()->routeIs('laporan.kensa')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Kensa</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('laporan.all') }}"
                            class="nav-link @if (request()->routeIs('laporan.all')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>All</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('laporan.trial') }}"
                            class="nav-link @if (request()->routeIs('laporan.trial')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Trial</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is('tr*') ? 'active menu-open' : '' }}">
                <a href="#" class="nav-link {{ Route::is('tr*') ? 'active menu-open' : '' }}">
                    <i class="nav-icon fas fa-exclamation-triangle"></i>
                    <p>
                        Trial
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('tr.racking') }}"
                            class="nav-link @if (request()->routeIs('tr.racking')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Racking Trial</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('tr.unracking') }}"
                            class="nav-link @if (request()->routeIs('tr.unracking')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Unracking Trial</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('tr.kensa') }}"
                            class="nav-link @if (request()->routeIs('tr.kensa')) active @else '' @endif">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            <p>Kensa Trial</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('racking_t.utama') }}"
                    class="nav-link">
                    <i class="nav-icon fas fa-people-carry"></i>
                    <p>
                        Latihan Menu Utama Racking
                    </p>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a href="{{ route('ngracking') }}"
                    class="nav-link">
                    <i class="nav-icon fas fa-people-carry"></i>
                    <p>
                        NG Molding Racking
                    </p>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="{{ route('pinbosh') }}"
                    class="nav-link">
                    <i class="nav-icon fas fa-people-carry"></i>
                    <p>
                        Pinbosh Tertinggal
                    </p>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="{{ route('rencana_produksi') }}"
                    class="nav-link">
                    <i class="nav-icon fas fa-people-carry"></i>
                    <p>
                        Latihan Rencana Produksi
                    </p>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="{{ route('stok_bc') }}"
                    class="nav-link">
                    <i class="nav-icon fas fa-people-carry"></i>
                    <p>
                        Stok di Lane
                    </p>
                </a>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
