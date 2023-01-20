@extends('layout.master')
@section('title')
    Laporan Data Kensa
@endsection

@push('page-styles')
    <style>
        .centering {
            margin: auto;
            width: 50%;
            border: 3px solid;
            border-color: #F4F6F9;
            padding: 10px;
        }
    </style>
@endpush

@section('breadcrumb')
    @parent
    <li class="active"> > Laporan > Kensa</li>
@endsection

@section('content')
    <div class="card-header centering">
        {{-- <form action="{{ route('laporan.kensa') }}" method="GET">
            <div class="row input-daterange">
                <div class="col-md-5">
                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $start_date }}">
                </div>
                <div class="col-md-1">
                    <center>
                        <font size="5"><b> - </b> </font>
                    </center>
                </div>p
                <div class="col-md-5">
                    <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $end_date }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form> --}}

        <form action="{{ route('laporan.kensa') }}" method="GET">
            <div class="row input-daterange">
                <div class="col-md-5">
                    <input type="datetime-local" class="form-control" name="start_date" id="start_date"
                        value="{{ $start_date }}">
                </div>
                <div class="col-md-1">
                    <center>
                        <font size="5"><b> - </b> </font>
                    </center>
                </div>
                <div class="col-md-5">
                    <input type="datetime-local" class="form-control" name="end_date" id="end_date"
                        value="{{ $end_date }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ number_format($total_ok, 2) }}%</h3>
                        <p>
                            <font size="5"> Total OK </font>
                        </p>
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
                        <p>
                            <font size="5"> Total NG </font>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $kensa_today }} Bar</h3>
                        <p>
                            <font size="5"> Jumlah Pengecekan </font>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ number_format($kensa_total, 0, '.', '.') }} Pcs</h3>
                        <p>
                            <font size="5"> Total Produksi </font>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tgl Kensa</th>
                        <th>Waktu Kensa</th>
                        <th>Part Name</th>
                        <th>No Bar</th>
                        <th>Qty Bar</th>
                        <th>Total OK</th>
                        <th>Cycle</th>
                        <th>Nikel</th>
                        <th>Butsu</th>
                        <th>Hadare</th>
                        <th>Hage</th>
                        <th>Moyo</th>
                        <th>Fukure</th>
                        <th>Crack</th>
                        <th>Henkei</th>
                        <th>Hana zaki</th>
                        <th>Kizu</th>
                        <th>Kaburi</th>
                        <th>Shiro moya</th>
                        <th>Shimi</th>
                        <th>Pitto</th>
                        <th>Misto</th>
                        <th>Other</th>
                        <th>Gores</th>
                        <th>Regas</th>
                        <th>Silver</th>
                        <th>Hike</th>
                        <th>Burry</th>
                        <th>Others</th>
                        <th>Total NG</th>
                        <th>% Total OK</th>
                        <th>% Total NG</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kensa as $no => $kensha)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td style="width:1px; white-space:nowrap;">
                                {{ \Carbon\Carbon::parse($kensha->tanggal_k)->format('d-m-Y') }} </td>
                            <td style="width:1px; white-space:nowrap;"> {{ $kensha->waktu_k }} </td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->part_name }}</td>
                            <td align="center">{{ $kensha->no_bar }}</td>
                            <td align="center">{{ $kensha->qty_bar }}</td>
                            <td align="center">{{ $kensha->total_ok }}</td>
                            <td align="center">{{ $kensha->cycle }}</td>
                            <td align="center">{{ $kensha->nikel }}</td>
                            <td align="center">{{ $kensha->butsu }}</td>
                            <td align="center">{{ $kensha->hadare }}</td>
                            <td align="center">{{ $kensha->hage }}</td>
                            <td align="center">{{ $kensha->moyo }}</td>
                            <td align="center">{{ $kensha->fukure }}</td>
                            <td align="center">{{ $kensha->crack }}</td>
                            <td align="center">{{ $kensha->henkei }}</td>
                            <td align="center">{{ $kensha->hanazaki }}</td>
                            <td align="center">{{ $kensha->kizu }}</td>
                            <td align="center">{{ $kensha->kaburi }}</td>
                            <td align="center">{{ $kensha->shiromoya }}</td>
                            <td align="center">{{ $kensha->shimi }}</td>
                            <td align="center">{{ $kensha->pitto }}</td>
                            <td align="center">{{ $kensha->misto }}</td>
                            <td align="center">{{ $kensha->other }}</td>
                            <td align="center">{{ $kensha->gores }}</td>
                            <td align="center">{{ $kensha->regas }}</td>
                            <td align="center">{{ $kensha->silver }}</td>
                            <td align="center">{{ $kensha->hike }}</td>
                            <td align="center">{{ $kensha->burry }}</td>
                            <td align="center">{{ $kensha->others }}</td>
                            <td align="center">{{ $kensha->total_ng }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->p_total_ok }} %</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->p_total_ng }} %</td>
                            {{-- <td style="width:1px; white-space:nowrap;">{{ $kensha->date_time }}</td> --}}

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8" class="bg-transparent"></td>
                        <td class="text-center"><b>{{ $sum_nikel }}</b></td>
                        <td class="text-center"><b>{{ $sum_butsu }}</b></td>
                        <td class="text-center"><b>{{ $sum_hadare }}</b></td>
                        <td class="text-center"><b>{{ $sum_hage }}</b></td>
                        <td class="text-center"><b>{{ $sum_moyo }}</b></td>
                        <td class="text-center"><b>{{ $sum_fukure }}</b></td>
                        <td class="text-center"><b>{{ $sum_crack }}</b></td>
                        <td class="text-center"><b>{{ $sum_henkei }}</b></td>
                        <td class="text-center"><b>{{ $sum_hanazaki }}</b></td>
                        <td class="text-center"><b>{{ $sum_kizu }}</b></td>
                        <td class="text-center"><b>{{ $sum_kaburi }}</b></td>
                        <td class="text-center"><b>{{ $sum_shiromoya }}</b></td>
                        <td class="text-center"><b>{{ $sum_shimi }}</b></td>
                        <td class="text-center"><b>{{ $sum_pitto }}</b></td>
                        <td class="text-center"><b>{{ $sum_misto }}</b></td>
                        <td class="text-center"><b>{{ $sum_other }}</b></td>
                        <td class="text-center"><b>{{ $sum_gores }}</b></td>
                        <td class="text-center"><b>{{ $sum_regas }}</b></td>
                        <td class="text-center"><b>{{ $sum_silver }}</b></td>
                        <td class="text-center"><b>{{ $sum_hike }}</b></td>
                        <td class="text-center"><b>{{ $sum_burry }}</b></td>
                        <td class="text-center"><b>{{ $sum_others }}</b></td>
                        <td class="text-center"><b>{{ $sum_total_ng }}</b></td>
                        <td class="text-center">{{ '-' }}</td>
                        <td class="text-center">{{ '-' }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- <div class="card-body">
        <h1>Total OK</h1>
        <h5>{{ number_format($total_ok,2) }}%</h5>
        <h1>Total NG</h1>
        <h5>{{ number_format($total_ng,2) }}%</h5>
    </div> --}}


    <br>
    </div>
@endsection

@push('page-script')
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('after-script')
    @include('sweetalert::alert')

    <script>
        $(document).ready(function() {
            $("#add-row").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": true,
                "pageLength": 75,
                "lengthMenu": [
                    [10, 25, 50, 75, -1],
                    [10, 25, 50, 75, "All"]
                ],
                "buttons": ["excel", "pdf", "print", "copy"],
                scrollY: "700px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    left: 8,
                }
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
