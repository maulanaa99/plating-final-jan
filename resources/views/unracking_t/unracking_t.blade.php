@extends('layout.master')
@section('title')
    Data Unracking
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Unracking</li>
@endsection
@section('content')
    <div class="card-header">
        <div class="row  float-right">
            <div class="col-12 col-md-12 col-lg-12">

            </div>
        </div>
        <form action="{{ route('unracking_t') }}" method="GET">
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
    </div>
    <div class="card-body">
        <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tgl Racking</th>
                    <th>Tgl Unracking</th>
                    <th>No.Bar</th>
                    <th>Part Name</th>
                    <th>No.Part</th>
                    <th>Channel</th>
                    <th>Qty Bar</th>
                    <th>Qty Aktual</th>
                    <th>Cycle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plating as $no => $unrack)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($unrack->tanggal_r)->format('d-m-Y') }} {{ $unrack->waktu_in_r }}</td>
                        <td>{{ \Carbon\Carbon::parse($unrack->tanggal_u)->format('d-m-Y') }} {{ $unrack->waktu_in_u }}</td>
                        <td>{{ $unrack->no_bar }}</td>
                        <td>{{ $unrack->part_name }}</td>
                        <td>{{ $unrack->no_part }}</td>
                        <td>{{ $unrack->channel }}</td>
                        <td>{{ $unrack->qty_bar }}</td>
                        <td>{{ $unrack->qty_aktual }}</td>
                        <td>{{ $unrack->cycle }}</td>
                        <td>
                            <a href="{{ route('unracking_t.edit', $unrack->id) }}"
                                class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i>  </a>
                            {{-- <a href="{{ route('unracking_t.print', $unrack->id) }}" class="btn btn-icon btn-sm btn-primary"
                                target="_blank"><i class="fas fa-print"></i> Print </a> --}}
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
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
