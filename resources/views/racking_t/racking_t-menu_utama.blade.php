@extends('layout.master')
@section('title')
    Menu Utama Racking
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Racking > Menu Utama</li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('racking_t.utama') }}" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ $date }}">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="text-white">Filter</label> <br>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <h1><b>Summary</b></h1>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <a href="{{ route('racking_t') }}">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                @if ($start_produksi == '')
                                    <h3>00:00:00</h3>
                                @else
                                    <h3>{{ $start_produksi }}</h3>
                                @endif
                                <p>
                                    <font size="5"> Start Produksi </font>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="{{ route('racking_t') }}">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                @if ($cycle_stop == '')
                                    <h3>00:00:00</h3>
                                @else
                                    <h3>{{ $cycle_stop }}</h3>
                                @endif
                                <p>
                                    <font size="5"> Cycle Stop </font>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="{{ route('racking_t') }}">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $jml_bar }} Bar</h3>
                                <p>
                                    <font size="5"> Aktual Produksi </font>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dumpster"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="{{ route('ngracking') }}">
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h3>{{ $count_rencana_produksi }} Bar</h3>
                                <p>
                                    <font size="5"> Rencana Produksi </font>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="{{ route('ngracking') }}">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $ngracking_today }} Pcs</h3>
                                <p>
                                    <font size="5"> NG Molding </font>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="{{ route('pinbosh') }}">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $sum_pinbosh_tertinggal }} Pcs</h3>
                                <p>
                                    <font size="5"> Pinbosh Tertinggal </font>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <br>
            </div>
        </div>
        <!-- ./col -->
        </div>
        </div>
    </section>
@endsection

@push('page-script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush

@push('after-script')
@endpush
