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
    <div class="card-header">
        <form action="{{ route('kensa.pengiriman') }}" method="GET">
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
                    <th>Tanggal Kanban</th>
                    <th>Jam</th>
                    <th class="align-middle text-center">Part Number</th>
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
                <?php $no = 1; ?>
                @foreach ($pengiriman as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->tgl_kanban)->format('d-m-Y') }}</td>
                        <td>{{ $row->waktu_kanban }}</td>
                        <td>{{ $row->no_part }}</td>
                        <td>{{ $row->part_name }}</td>
                        <td align="center">{{ $row->no_kartu }}</td>
                        <td>{{ $row->next_process }}</td>
                        <td align="center">{{ $row->kirim_painting }}</td>
                        <td align="center">{{ $row->kirim_assy }}</td>
                        <td align="center">{{ $row->kirim_ppic }}</td>
                        <td align="center">
                            <a href="{{ route('kensa.cetak_kanban', $row->id) }}" class="btn btn-icon btn-sm btn-primary"
                                target="_blanke"><i class="fas fa-print"></i> Cetak </a>
                            <button type="button" class="btn btn-danger btn-sm delete-button "
                                data-id="{{ $row->id }}"> <i class="far fa-trash-alt"> Hapus
                                </i></button>
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
    $(document).on('click', '.delete-button', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/kensa/pengiriman/delete/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.success) {
                            Swal.fire(
                                'Terhapus!',
                                'Data Anda telah dihapus.',
                                'success'
                            ).then((result) => {
                                window.location.href = '/kensa/pengiriman';
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Part sudah di Unracking.',
                                'error'
                            )
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        ).then((result) => {
                            window.location.href = '/kensa/pengiriman';
                        });
                    }
                });
            }
        })
    });
</script>

    {{-- <script>
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
                    } else {}
                });
        });
    </script> --}}
@endpush
