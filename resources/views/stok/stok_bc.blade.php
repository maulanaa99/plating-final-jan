@extends('layout.master')
@section('title')
    Data Stok di Lane
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> Stok > Stok di Lane</li>
@endsection

@section('content')
    <div class="card-header">
        <div class="row float-right">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('ngracking.tambah') }}" class="btn btn-icon icon-left btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="col-md-12">
            <h2>Data Stok CS - FS</h2>
            <span> Jumlah Produksi = {{ $count_stok_bc }} Bar</span><br>
            <span> Total Produksi = {{ $sum_qty_bar }} Pcs</span>
            <div class="table-responsive">
                <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Part Name</th>
                            <th>No Bar</th>
                            <th>Cycle</th>
                            <th>Qty Bar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($stok_bc as $no => $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->tanggal_r }} {{ $row->waktu_in_r }} </td>
                                <td>{{ $row->part_name }}</td>
                                <td>{{ $row->no_bar }}</td>
                                <td>{{ $row->cycle }}</td>
                                <td>{{ $row->qty_bar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" align="center"> <b> Total </b></td>
                            <td> <b> {{ $sum_qty_bar }} Pcs </b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
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
                "buttons": ["csv", "excel", "pdf", "print"]
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
