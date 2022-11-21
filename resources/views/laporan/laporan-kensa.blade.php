@extends('layout.master')
@section('title')
    Data Racking
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
    <li class="active"> > Racking</li>
@endsection

@section('content')
    <div class="card-header centering">
        <form action="{{ route('laporan.kensa') }}" method="GET">
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
                        <th rowspan="2" class="align-middle text-center">#</th>
                        <th rowspan="2" class="align-middle text-center">Tanggal</th>
                        <th rowspan="2" class="align-middle text-center">Part Name</th>
                        <th rowspan="2" class="align-middle text-center">No Bar</th>
                        <th rowspan="2" class="align-middle text-center">Qty Bar</th>
                        <th rowspan="2" class="align-middle text-center">Cycle</th>
                        <th colspan="12" class="align-middle text-center">NG PLATING</th>
                        <th colspan="6" class="align-middle text-center">NG MOLDING</th>
                        <th colspan="5" class="align-middle text-center">Total</th>
                    </tr>
                    <tr>
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
                    @foreach ($kensa as $no => $kensha)
                        <tr>
                            <td style="width:1px; white-space:nowrap;">{{ $no + 1 }}</td>
                            <td style="width:1px; white-space:nowrap;">
                                {{ \Carbon\Carbon::parse($kensha->tanggal_k)->format('d-m-Y') }}
                                {{ \Carbon\Carbon::parse($kensha->waktu_k)->format('H:i:s') }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->part_name }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->no_bar }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->qty_bar }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->cycle }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->nikel }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->butsu }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->hadare }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->hage }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->moyo }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->fukure }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->crack }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->henkei }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->hanazaki }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->kizu }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->kaburi }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->other }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->gores }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->regas }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->silver }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->hike }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->burry }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->others }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->total_ok }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->total_ng }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->p_total_ok }} %</td>
                            <td style="width:1px; white-space:nowrap;">{{ $kensha->p_total_ng }} %</td>
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
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "pageLength": 75,
                "lengthMenu": [
                    [10, 25, 50, 75, -1],
                    [10, 25, 50, 75, "All"]
                ],
                "buttons": ["excel", "pdf", "print"]
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