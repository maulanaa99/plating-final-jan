@extends('layout.master')
@section('title')
    Input Data Racking
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Racking</li>
@endsection

@section('content')
    {{-- <marquee direction="left" scrollamount="8" align="center">SELAMAT DATANG DI APLIKASI RACKING <br> UTAMAKAN KESELAMATAN KERJA</marquee> --}}
    <div class="card-header">
        <div class="row float-right">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('racking_t.tambah') }}" class="btn btn-icon icon-left btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tgl Racking</th>
                        <th>No Bar</th>
                        <th>Part Name</th>
                        <th>No Part</th>
                        <th>Katalis</th>
                        <th>Channel</th>
                        <th>Grade Color</th>
                        <th>Qty Bar</th>
                        <th>Tgl Lot Prod Mldg</th>
                        <th>Cycle</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($plating as $no => $racking)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($racking->tanggal_r)->format('d-m-Y') }} {{ $racking->waktu_in_r }}</td>
                            <td>{{ $racking->no_bar }}</td>
                            <td>{{ $racking->part_name }}</td>
                            <td>{{ $racking->no_part }}</td>
                            <td>{{ $racking->katalis }}</td>
                            <td>{{ $racking->channel }}</td>
                            <td>{{ $racking->grade_color }}</td>
                            <td>{{ $racking->qty_bar }}</td>
                            <td>{{ \Carbon\Carbon::parse($racking->tgl_lot_prod_mldg)->format('d-m-Y') }}</td>
                            <td>{{ $racking->cycle }}</td>
                            <td>
                                <a href="{{ route('racking_t.edit', $racking->plating_id) }}"
                                    class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i> Edit </a>

                                {{-- <a href="#" data-id="{{ $racking->plating_id }}"
                            class="btn btn-icon btn-sm btn-danger swal-confirm"><i class="fas fa-times"></i>
                            Delete
                            <form action="{{ route('racking_t.delete', $racking->plating_id) }}"
                                id="delete{{ $racking->plating_id }}" method="POST">
                                @csrf
                                @method('delete')
                            </form>
                        </a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    {{-- {!! $plating->links() !!} --}}
    </div>
@endsection

@push('page-script')
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('after-script')
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
