@extends('layout.master')
@section('title')
    Menu Utama
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Kensa > Menu Utama</li>
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <h1><b>Summary</b></h1>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($total_ok, 2) }}%</h3>
                            <p> <font size="5"> Total OK </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($total_ng, 2) }}%</h3>
                            <p> <font size="5"> Total NG </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dumpster"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $kensa_today }} Bar</h3>
                            <p> <font size="5"> Jumlah Pengecekan Hari ini </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>

            </div>

            <h1><b>NG PLATING</b></h1>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ number_format($nikel,2) }}%</h3>
                            <p> <font size="5"> NIKEL </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-virus"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($butsu,2) }}%</h3>
                            <p> <font size="5"> BUTSU </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($hadare,2) }}%</h3>
                            <p> <font size="5"> HADARE </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-unlink"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($hage,2) }}%</h3>
                            <p> <font size="5"> HAGE </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{ number_format($moyo,2) }}%</h3>
                            <p> <font size="5"> MOYO </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-trailer"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-grey">
                        <div class="inner">
                            <h3>{{ number_format($fukure,2) }}%</h3>
                            <p> <font size="5"> FUKURE </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ number_format($crack,2) }}%</h3>
                            <p> <font size="5"> CRACK </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-terminal"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>{{ number_format($henkei,2) }}%</h3>
                            <p> <font size="5"> HENKEI </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sun"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($hanazaki,2) }}%</h3>
                            <p> <font size="5"> HANAZAKI </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-subscript"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ number_format($kizu,2) }}%</h3>
                            <p> <font size="5"> KIZU </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-stop-circle"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($kaburi,2) }}%</h3>
                            <p> <font size="5"> KABURI </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-star-of-life"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <h3>{{ number_format($other,2) }}%</h3>
                            <p> <font size="5"> OTHER </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-spray-can"></i>
                        </div>
                    </div>
                </div>
            </div>

            <h1><b>NG MOLDING</b></h1>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ number_format($gores,2) }}%</h3>
                            <p> <font size="5"> GORES </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-slash"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ number_format($regas,2) }}%</h3>
                            <p> <font size="5"> REGAS </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shield-virus"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($silver,2) }}%</h3>
                            <p> <font size="5"> SILVER </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-ruler"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($hike,2) }}%</h3>
                            <p> <font size="5"> HIKE </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-recycle"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ number_format($burry,2) }}%</h3>
                            <p> <font size="5"> BURRY </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-percent"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <h3>{{ number_format($others,2) }}%</h3>
                            <p> <font size="5"> OTHERS </font></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-pager"></i>
                        </div>
                    </div>
                </div>
                
                <br>
            </div>
        </div>
        <!-- ./col -->
        </div>
        </div>
    </section>
@endsection

@push('after-script')
@endpush
