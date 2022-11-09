@extends('layout.master')
@section('title')
    Menu Utama
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > MENU UTAMA</li>
@endsection


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
                                <h3>RACKING</h3>
                                <p class="text-info">-</p>
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
                                <h3>UNRACKING</h3>
                                <p class="text-success">-</p>
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
                                <h3>KENSA</h3>
                                <p class="text-warning">-</p>
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
                                <h3>STOK</h3>
                                <p class="text-danger">DATA PART</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
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
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-script')
@endpush
