@extends('layout.master')
@section('title')
    Data NG Molding Racking
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > NG Molding Racking</li>
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
        <div class="table-responsive">
            <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Part Name</th>
                        <th>Jenis NG</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($ngracking as $no => $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->tanggal }}</td>
                            <td>{{ $row->part_name }}</td>
                            <td>{{ $row->jenis_ng }}</td>
                            <td>{{ $row->quantity }} Pcs</td>
                            <td>
                                <a href="{{ route('ngracking.edit', $row->id) }}" class="btn btn-icon btn-sm btn-warning"><i
                                        class="far fa-edit"></i> Edit </a>
                                <a href="#" data-id="{{ $row->id }}"
                                    class="btn btn-icon btn-sm btn-danger swal-confirm"><i class="far fa-trash-alt"> Hapus
                                    </i>
                                    <form action="{{ route('ngracking.delete', $row->id) }}" method="POST" id="delete{{ $row->id }}">
                                        @csrf
                                    </form>
                                </a>
                            </td>
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
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
