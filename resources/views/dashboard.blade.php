@extends('layout.master')
@section('title')
    Menu Utama
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > MENU UTAMA</li>
@endsection

@push('page-styles')
    <style>
        h3 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
        }
    </style>
@endpush


@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <a href="{{ route('racking_t') }}">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 class="text-center">RACKING</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <a href="{{ route('unracking_t') }}">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3 class="text-center">UNRACKING</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="{{ route('kensa') }}">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 class="text-center">KENSA</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <a href="{{ route('stok') }}">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 class="text-center">STOK</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <h2>Data Stok Tersedia</h2>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Part Name</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($avail_stock as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->part_name }}</td>
                                        <td>{{ $row->stok }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Data Before Check</h2>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Part Name</th>
                                    <th>Stok BC</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bc_stock as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->part_name }}</td>
                                        <td>{{ $row->stok_bc }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}


            {{-- <div class="row">
                <div class="col-md-6">
                    <h2>Data Stok di Lane</h2>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Part Name</th>
                                    <th>No Bar</th>
                                    <th>Cycle</th>
                                    <th>Qty Bar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stok_in_lane as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->part_name }}</td>
                                        <td>{{ $row->no_bar }}</td>
                                        <td>{{ $row->cycle }}</td>
                                        <td>{{ $row->qty_bar }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection

@push('after-script')
@endpush
