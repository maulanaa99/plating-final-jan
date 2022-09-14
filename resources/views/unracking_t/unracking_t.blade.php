@extends('layout.master')
@section('title')
    Input Data Unracking
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Unracking</li>
@endsection
@section('content')
    <div class="card-header">
        <div class="row  float-right">
            <div class="col-12 col-md-12 col-lg-12">
                {{-- <a href="{{ route('unracking_t.tambah') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a> --}}
                {{-- <a href="{{ route('unracking_t.export') }}" class="btn btn-icon icon-left btn-success"><i
                        class="fas fa-download"></i>Export Data</a> --}}
            </div>
        </div>
    </div>

    

    <div class="card-body">
        <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tgl Racking</th>
                    <th>Waktu in Racking</th>
                    <th>Tgl Unracking</th>
                    <th>Waktu In Unracking</th>
                    <th>No.Bar</th>
                    <th>Part Name</th>
                    <th>No.Part</th>
                    {{-- <th>Katalis</th> --}}
                    <th>Channel</th>
                    {{-- <th>Grade Color</th> --}}
                    <th>Qty Bar</th>
                    <th>Qty Aktual</th>
                    {{-- <th>Tgl Lot Prod Mldg</th> --}}
                    <th>Cycle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plating as $no => $unracking)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($unracking->tanggal_r)->format('d-m-Y') }}</td>
                        <td>{{ $unracking->waktu_in_r }}</td>
                        <td>{{ \Carbon\Carbon::parse($unracking->tanggal_u)->format('d-m-Y') }}</td>
                        <td>{{ $unracking->waktu_in_u }}</td>
                        <td>{{ $unracking->no_bar }}</td>
                        <td>{{ $unracking->part_name }}</td>
                        <td>{{ $unracking->no_part }}</td>
                        {{-- <td>{{ $unracking->katalis }}</td> --}}
                        <td>{{ $unracking->channel }}</td>
                        {{-- <td>{{ $unracking->grade_color }}</td> --}}
                        <td>{{ $unracking->qty_bar }}</td>
                        <td>{{ $unracking->qty_aktual }}</td>
                        {{-- <td>{{ \Carbon\Carbon::parse($unracking->tgl_lot_prod_mldg)->format('d-m-Y') }}</td> --}}
                        <td>{{ $unracking->cycle }}</td>
                        <td>
                            <a href="{{ route('unracking_t.edit', $unracking->plating_id) }}" 
                            class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i> Edit </a>
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
                "lengthMenu": [ [10, 25, 50, 75, -1], [10, 25, 50, 75, "All"] ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: 'Hapus data? ',
                    text: 'Setelah dihapus data tidak dapat dikembalikan',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // swal('Poof! Your imaginary file has been deleted!', {
                        // icon: 'success',
                        // });
                        $(`#delete${id}`).submit();
                    } else {
                        // swal('Your imaginary file is safe!');
                    }
                });
        });
    </script>
@endpush
