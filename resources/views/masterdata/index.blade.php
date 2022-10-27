@extends('layout.master')
@section('title')
    Masterdata Part
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Masterdata</li>
@endsection

@section('content')
    <div class="card-header">
        <div class="row float-right">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('master.tambah') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i>
                    Tambah Data</a>
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#importExcel"><i
                        class="fas fa-upload"></i>Import Data</a>
            </div>
        </div>
    </div>


    {{-- TABLE MASTERDATA --}}
    <div class="card-body">
        <table id="add-row" class="table table-sm table-hover table-bordered table-striped responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="align-middle text-center">Part Number</th>
                    <th class="align-middle text-center">Part Name</th>
                    <th class="align-middle text-center">Katalis</th>
                    <th class="align-middle text-center">Channel</th>
                    <th class="align-middle text-center">Chrome</th>
                    <th class="align-middle text-center">Qty Bar</th>
                    <th class="align-middle text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($masterdata as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->no_part }}</td>
                        <td>{{ $data->part_name }}</td>
                        <td>{{ $data->katalis }}</td>
                        <td>{{ $data->channel }}</td>
                        <td>{{ $data->grade_color }}</td>
                        <td>{{ $data->qty_bar }}</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('master.show', $data->id) }}" class="btn btn-icon btn-sm btn-primary"><i
                                    class="far fa-eye"></i></a>
                            <a href="{{ route('master.edit', $data->id) }}" class="btn btn-icon btn-sm btn-warning"><i
                                    class="far fa-edit"></i></a>
                            <a href="javascript:void(0)" data-id="{{ $data->id }}"
                                class="btn btn-icon btn-sm btn-danger swal-confirm"><i class="fas fa-times"></i>

                                <form action="{{ route('master.delete', $data->id) }}" id="delete{{ $data->id }}"
                                    method="POST">
                                    @csrf
                                </form>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{-- {!! $masterdata->links() !!} --}}
    </div>


    {{-- MODAL IMPORT EXCEL --}}
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="/masterdata/import_excel" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <label>Pilih File Excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
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
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                pageLength: 75,
                lengthMenu: [
                    [10, 25, 50, 75, -1],
                    [10, 25, 50, 75, "All"]
                ],
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
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
                    } else {}
                });
        });
    </script>
@endpush
