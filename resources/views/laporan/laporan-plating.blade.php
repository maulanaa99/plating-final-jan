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
            border-color:#F4F6F9;
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
        <form action="{{ route('laporan') }}" method="GET">
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
                        <th>#</th>
                        <th>Tgl Racking</th>
                        <th>Tgl Unracking</th>
                        <th>No Bar</th>
                        <th>Part Name</th>
                        <th>No Part</th>
                        <th>Katalis</th>
                        <th>Channel</th>
                        <th>Grade Color</th>
                        <th>Qty Bar</th>
                        <th>Qty Aktual</th>
                        <th>Tgl Lot Prod Mldg</th>
                        <th>Cycle</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($plating as $no => $rack)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($rack->tanggal_r)->format('d-m-Y') }} {{ $rack->waktu_in_r }}</td>
                            <td>{{ \Carbon\Carbon::parse($rack->tanggal_u)->format('d-m-Y') }} {{ $rack->waktu_in_u }}</td>
                            <td>{{ $rack->no_bar }}</td>
                            <td>{{ $rack->part_name }}</td>
                            <td>{{ $rack->no_part }}</td>
                            <td>{{ $rack->katalis }}</td>
                            <td>{{ $rack->channel }}</td>
                            <td>{{ $rack->grade_color }}</td>
                            <td>{{ $rack->qty_bar }}</td>
                            <td>{{ $rack->qty_aktual }}</td>
                            <td>{{ \Carbon\Carbon::parse($rack->tgl_lot_prod_mldg)->format('d-m-Y') }}</td>
                            <td>{{ $rack->cycle }}</td>
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
