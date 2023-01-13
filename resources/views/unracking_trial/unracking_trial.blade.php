@extends('layout.master')
@section('title')
    Data Trial Unracking
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Unracking</li>
@endsection

@section('content')
    <div class="card-header centering">
        <form action="{{ route('tr.unracking') }}" method="GET">
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
        <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="align-middle text-center">Tgl Racking</th>
                    <th class="align-middle text-center">Tgl Unracking</th>
                    <th class="align-middle text-center">No Bar</th>
                    <th class="align-middle text-center">Part Name</th>
                    <th class="align-middle text-center">Part Number</th>
                    <th class="align-middle text-center">Channel</th>
                    <th class="align-middle text-center">Qty Bar</th>
                    <th class="align-middle text-center">Qty Aktual</th>
                    <th class="align-middle text-center">Cycle</th>
                    <th class="align-middle text-center">Keterangan</th>
                    <th class="align-middle text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unracking_trial as $no => $unrack)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td align="center">{{ \Carbon\Carbon::parse($unrack->tanggal_r)->format('d-m-Y') }} {{ $unrack->waktu_in_r }}</td>
                        <td align="center">{{ \Carbon\Carbon::parse($unrack->tanggal_u)->format('d-m-Y') }}
                        <td align="center">{{ $unrack->no_bar }}</td>
                        <td align="center">{{ $unrack->part_name }}</td>
                        <td align="center">{{ $unrack->no_part }}</td>
                        <td align="center">{{ $unrack->channel }}</td>
                        <td align="center">{{ $unrack->qty_bar }}</td>
                        <td align="center">{{ $unrack->qty_aktual }}</td>
                        <td align="center">{{ $unrack->cycle }}</td>
                        <td align="center">{{ $unrack->keterangan }}</td>
                        <td align="center">
                            <a href="{{ route('tr.unracking.edit', $unrack->id) }}"
                                class="btn btn-icon btn-sm btn-warning" target="_blank"><i class="far fa-edit"></i> </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                scrollY: "700px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    left: 2,
                }
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });

        setTimeout(function() {
            location.reload();
        }, 600000);
    </script>
@endpush
