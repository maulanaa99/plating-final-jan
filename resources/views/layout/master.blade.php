<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PLATING | PT. SAKAE RIKEN INDONESIA | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/main/style.css') }}?"> --}}
    <link rel="shortcut icon" href="{{ asset('icons/favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @stack('page-styles')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                @php
                    $id = Auth::user()->id;
                    $adminData = App\Models\User::find($id);
                @endphp

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img class="user-image img-circle elevation-2"
                            src="{{ !empty($adminData->profile_images) ? url('upload/admin_images/' . $adminData->profile_images) : url('upload/no_image.jpg') }}"
                            alt="Header Avatar">
                        <span class="d-none d-md-inline"> {{ Auth::user()->name }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img class="user-image img-circle elevation-2"
                                src="{{ !empty($adminData->profile_images) ? url('upload/admin_images/' . $adminData->profile_images) : url('upload/no_image.jpg') }}"
                                alt="Header Avatar">
                            <p>
                                {{ Auth::user()->name }}
                                <small>Plating</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">Profile</a>
                            <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat float-right">Sign
                                out</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-info elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link">
                <img src="{{ asset('assets/dist/img/sri2.jpg') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PT. Sakae Riken IDN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <nav>
                    <ul>
                        <li class="nav nav-pills nav-sidebar flex-column mt-3" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <a href="#">
                                <?php
                                $tanggal = mktime(date('m'), date('d'), date('Y'));
                                echo 'Tanggal : <b>' . date('d-M-Y', $tanggal) . '</b> ';
                                date_default_timezone_set('Asia/Jakarta');
                                ?>
                            </a>
                            <a href="#"> Jam : <b><span id="jam"></span></b></a>
                        </li>
                    </ul>
                </nav>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link @if (request()->routeIs('dashboard*')) active @else '' @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
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
                            <a href="{{ route('stok') }}"
                                class="nav-link @if (request()->routeIs('stok*')) active @else '' @endif">
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
                            <a href="#tr" class="nav-link {{ Route::is('kensa*') ? 'active menu-open' : '' }}">
                                <i class="nav-icon fas fa-search-plus"></i>
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
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Input Stock</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kensa.printKanban') }}"
                                        class="nav-link @if (request()->routeIs('kensa.printKanban')) active @else '' @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Print Kanban</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kensa.pengiriman') }}"
                                        class="nav-link @if (request()->routeIs('kensa.pengiriman')) active @else '' @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengiriman</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Rekapitulasi Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Racking</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Unracking</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kensa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @section('breadcrumb')
                                    <li><a href="{{ url('/') }}"><i class="nav-icon fas fa-tachometer-alt"></i> Home
                                        </a></li>
                                @show
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                @yield('content')
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.04.10.22
            </div>
            <strong>Copyright &copy; 2022 <a href="https://adminlte.io">Maulana Malik Ibrahim</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- Validator -->
    <script src="{{ asset('js/validator.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @stack('page-script')

    @stack('after-script')

    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s;

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>

</body>

</html>
