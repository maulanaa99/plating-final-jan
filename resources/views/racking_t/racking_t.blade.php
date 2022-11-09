@extends('layout.master')
@section('title')
    Data Racking
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Racking</li>
@endsection

@section('content')
    <div class="card-header">
        <div class="row float-right">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('racking_t.tambah') }}" class="btn btn-icon icon-left btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <form action="{{ route('racking_t') }}" method="GET">
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
                        <th class="align-middle text-center">No Part</th>
                        <th class="align-middle text-center">Katalis</th>
                        <th class="align-middle text-center">Channel</th>
                        <th class="align-middle text-center">Grade Color</th>
                        <th class="align-middle text-center">Qty Bar</th>
                        <th class="align-middle text-center">Tgl Lot Prod Mldg</th>
                        <th class="align-middle text-center">Cycle</th>
                        <th class="align-middle text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($racking as $no => $rack)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($rack->tanggal_r)->format('d-m-Y') }} {{ $rack->waktu_in_r }}</td>
                            <td>{{ $rack->no_bar }}</td>
                            <td>{{ $rack->part_name }}</td>
                            <td>{{ $rack->no_part }}</td>
                            <td>{{ $rack->katalis }}</td>
                            <td>{{ $rack->channel }}</td>
                            <td>{{ $rack->grade_color }}</td>
                            <td>{{ $rack->qty_bar }}</td>
                            <td>{{ \Carbon\Carbon::parse($rack->tgl_lot_prod_mldg)->format('d-m-Y') }}</td>
                            <td>{{ $rack->cycle }}</td>
                            <td>
                                <a href="{{ route('racking_t.edit', $rack->id) }}"
                                    class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i>  </a>
                                <a href="#" data-id="{{ $rack->id }}"
                                    class="btn btn-icon btn-sm btn-danger swal-confirm"><i class="far fa-trash-alt">
                                        </i>

                                    <form action="{{ route('racking_t.delete', $rack->id) }}"
                                        id="delete{{ $rack->id }}" method="POST">
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
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
