@extends('layout.master')
@section('title')
    Data Racking - Unracking - Kensa
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
    <li class="active"> > Data Racking - Unracking - Kensa</li>
@endsection

@section('content')
    <div class="card-header centering">
        <form action="{{ route('laporan.all') }}" method="GET">
            <div class="row input-daterange">
                <div class="col-md-5">
                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $start_date }}">
                </div>
                <div class="col-md-1">
                    <center>
                        <font size="5"><b> - </b> </font>
                    </center>
                </div>
                <div class="col-md-5">
                    <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $end_date }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tgl Racking</th>
                        <th>Tgl Unracking</th>
                        <th>Tgl Kensa</th>
                        <th>Part Name</th>
                        <th>No Bar</th>
                        <th>Channel</th>
                        <th>Chrome</th>
                        <th>Katalis</th>
                        <th>Qty Bar</th>
                        <th>Qty Aktual</th>
                        <th>Cycle</th>
                        <th>Nikel</th>
                        <th>Butsu</th>
                        <th>Hadare</th>
                        <th>Hage</th>
                        <th>Moyo</th>
                        <th>Fukure</th>
                        <th>Crack</th>
                        <th>Henkei</th>
                        <th>Hanazaki</th>
                        <th>Kizu</th>
                        <th>Kaburi</th>
                        <th>Shiromoya</th>
                        <th>Shimi</th>
                        <th>Pitto</th>
                        <th>Other</th>
                        <th>Gores</th>
                        <th>Regas</th>
                        <th>Silver</th>
                        <th>Hike</th>
                        <th>Burry</th>
                        <th>Others</th>
                        <th>Total OK</th>
                        <th>Total NG</th>
                        <th>% Total OK</th>
                        <th>% Total NG</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alls as $no => $all)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($all->tanggal_r)->format('d-m-Y') }} {{ $all->waktu_in_r }}</td>
                            <td>{{ \Carbon\Carbon::parse($all->tanggal_u)->format('d-m-Y') }} {{ $all->waktu_in_u }}</td>
                            <td>{{ \Carbon\Carbon::parse($all->tanggal_k)->format('d-m-Y') }} {{ $all->waktu_k }}</td>
                            <td>{{ $all->part_name }}</td>
                            <td>{{ $all->no_bar }}</td>
                            <td>{{ $all->channel }}</td>
                            <td>{{ $all->grade_color }}</td>
                            <td>{{ $all->katalis }}</td>
                            <td>{{ $all->qty_bar }}</td>
                            <td>{{ $all->qty_aktual }}</td>
                            <td>{{ $all->cycle }}</td>
                            <td>{{ $all->nikel }}</td>
                            <td>{{ $all->butsu }}</td>
                            <td>{{ $all->hadare }}</td>
                            <td>{{ $all->hage }}</td>
                            <td>{{ $all->moyo }}</td>
                            <td>{{ $all->fukure }}</td>
                            <td>{{ $all->crack }}</td>
                            <td>{{ $all->henkei }}</td>
                            <td>{{ $all->hanazaki }}</td>
                            <td>{{ $all->kizu }}</td>
                            <td>{{ $all->kaburi }}</td>
                            <td>{{ $all->shiromoya }}</td>
                            <td>{{ $all->shimi }}</td>
                            <td>{{ $all->pitto }}</td>
                            <td>{{ $all->other }}</td>
                            <td>{{ $all->gores }}</td>
                            <td>{{ $all->regas }}</td>
                            <td>{{ $all->silver }}</td>
                            <td>{{ $all->hike }}</td>
                            <td>{{ $all->burry }}</td>
                            <td>{{ $all->others }}</td>
                            <td>{{ $all->total_ok }}</td>
                            <td>{{ $all->total_ng }}</td>
                            <td>{{ $all->p_total_ok }}%</td>
                            <td>{{ $all->p_total_ng }}%</td>
                            {{-- <td style="width:1px; white-space:nowrap;"> --}}
                            {{-- <a href="{{ route('kensa.edit', $kensha->id) }}" class="btn btn-icon btn-sm btn-warning"><i
                                        class="far fa-edit"></i></a> --}}
                            {{-- <a href="#" data-id="{{ $kensha->id }}"
                                    class="btn btn-icon btn-sm btn-danger swal-confirm"><i class="far fa-trash-alt">
                                        </i>
                                    <form action="{{ route('kensa.delete', $kensha->id) }}" id="delete{{ $kensha->id }}"
                                        method="POST">
                                        @csrf
                                    </form>
                                </a> --}}
                            {{-- </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
                "autoWidth": false,
                "pageLength": 75,
                "lengthMenu": [
                    [10, 25, 50, 75, -1],
                    [10, 25, 50, 75, "All"]
                ],
                "buttons": ["excel", "pdf", "print"],
                scrollY: "700px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    left: 6,
                }
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: 'Hapus data? ',
                    text: 'Setelah dihapus, data tidak dapat dikembalikan',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(`#delete${id}`).submit();
                    } else {}
                });
        });
    </script>
@endpush
