@extends('layout.master')

@section('title')
    Data Racking Trial
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> Trial > Racking Trial</li>
@endsection

@section('content')
    <div class="card-header">
        <div class="row float-right">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('tr.racking.tambah') }}" class="btn btn-icon icon-left btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <form action="{{ route('tr.racking') }}" method="GET">
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
        <div class="table-responsive">
            <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="align-middle text-center">#</th>
                        <th class="align-middle text-center">Tgl Racking</th>
                        <th class="align-middle text-center">No Bar</th>
                        <th class="align-middle text-center">Part Name</th>
                        <th class="align-middle text-center">Part Number</th>
                        <th class="align-middle text-center">Katalis</th>
                        <th class="align-middle text-center">Channel</th>
                        <th class="align-middle text-center">Chrome</th>
                        <th class="align-middle text-center">Qty Bar</th>
                        <th class="align-middle text-center">Cycle</th>
                        <th class="align-middle text-center">PIC</th>
                        <th class="align-middle text-center">Keterangan</th>
                        <th class="align-middle text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($racking_trial as $no => $rack)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td align="center">{{ \Carbon\Carbon::parse($rack->tanggal_r)->format('d-m-Y') }} {{ $rack->waktu_in_r }}</td>
                            <td align="center">{{ $rack->no_bar }}</td>
                            <td>{{ $rack->part_name }}</td>
                            <td align="center">{{ $rack->no_part }}</td>
                            <td align="center">{{ $rack->katalis }}</td>
                            <td align="center">{{ $rack->channel }}</td>
                            <td align="center">{{ $rack->grade_color }}</td>
                            <td align="center">{{ $rack->qty_bar }}</td>
                            <td align="center">{{ $rack->cycle }}</td>
                            <td align="center">{{ $rack->created_by }}</td>
                            <td align="center">{{ $rack->keterangan }}</td>
                            <td align="center">
                                <a href="{{ route('tr.racking.edit', $rack->id) }}"
                                    class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i> </a>
                                <button type="button" class="btn btn-danger btn-sm delete-button"
                                    data-id="{{ $rack->id }}"> <i class="far fa-trash-alt">
                                    </i></button>
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
    {{-- <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
@endpush

@push('after-script')
@include('sweetalert::alert');
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
            });
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
                        url: '/racking_trial/delete/' + id,
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
                                    window.location.href = '/racking_trial';
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
                                window.location.href = '/racking_trial';
                            });
                        }
                    });
                }
            })
        });
    </script>
@endpush
