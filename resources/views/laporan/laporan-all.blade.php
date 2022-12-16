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
                            <td style="width:1px; white-space:nowrap;">{{ $no + 1 }}</td>

                            <td style="width:1px; white-space:nowrap;">
                                {{ \Carbon\Carbon::parse($all->tanggal_r)->format('d-m-Y') }}
                                {{ \Carbon\Carbon::parse($all->waktu_in_r)->format('H:i:s') }}</td>

                            <td style="width:1px; white-space:nowrap;">
                                {{ \Carbon\Carbon::parse($all->tanggal_u)->format('d-m-Y') }}
                                {{ \Carbon\Carbon::parse($all->waktu_in_u)->format('H:i:s') }}</td>

                            <td style="width:1px; white-space:nowrap;">
                                {{ \Carbon\Carbon::parse($all->tanggal_k)->format('d-m-Y') }}
                                {{ \Carbon\Carbon::parse($all->waktu_k)->format('H:i:s') }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->part_name }}</td>

                            <td style="width:1px; white-space:nowrap;">{{ $all->no_bar }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->channel }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->grade_color }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->katalis }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->qty_bar }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->qty_aktual }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->cycle }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->nikel }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->butsu }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->hadare }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->hage }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->moyo }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->fukure }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->crack }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->henkei }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->hanazaki }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->kizu }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->kaburi }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->shiromoya }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->shimi }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->pitto }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->other }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->gores }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->regas }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->silver }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->hike }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->burry }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->others }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->total_ok }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->total_ng }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->p_total_ok }}%</td>
                            <td style="width:1px; white-space:nowrap;">{{ $all->p_total_ng }}%</td>
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
