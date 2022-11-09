@extends('layout.master')
@section('title')
    Data Pengiriman
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Kensa > Data Pengiriman</li>
@endsection
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kanban Pengiriman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Kanban Pengiriman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')

    <div class="card-body">
        <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal Kanban</th>
                    <th class="align-middle text-center">No Part</th>
                    <th class="align-middle text-center">Part Name</th>
                    <th>No Kartu</th>
                    <th>Next Process</th>
                    <th>Kirim Painting</th>
                    <th>Kirim Assembly</th>
                    <th>Kirim PPIC</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                @foreach ($pengiriman as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td >{{ \Carbon\Carbon::parse($row->tgl_kanban)->format('d-m-Y') }}</td>
                        <td >{{ $row->no_part }}</td>
                        <td >{{ $row->part_name }}</td>
                        <td>{{ $row->no_kartu }}</td>
                        <td >{{ $row->next_process }}</td>
                        <td>{{ $row->kirim_painting }}</td>
                        <td>{{ $row->kirim_assy }}</td>
                        <td>{{ $row->kirim_ppic }}</td>
                        <td>
                            <a href="{{ route('kensa.cetak_kanban', $row->id) }}"
                                class="btn btn-icon btn-sm btn-primary" target="_blanke"><i class="fas fa-print"></i> Cetak </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    {{-- {!! $kensa->links() !!} --}}
    </div>
@endsection

@push('page-script')
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('after-script')
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
                        $(`#delete${id}`).submit();
                    } else {
                    }
                });
        });
    </script>
@endpush
