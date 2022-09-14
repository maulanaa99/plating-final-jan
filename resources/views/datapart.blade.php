@extends('layout.master')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Part</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#modalAddDataPart">
                                        <i class="fa fa-plus"></i>
                                        Add Row
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No Part</th>
                                                <th>Nama Part</th>
                                                <th>Stok</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $no=1; @endphp
                                            @foreach ($datapart as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row->no_part }}</td>
                                                    <td>{{ $row->nama_part }}</td>
                                                    <td>{{ $row->stok }}</td>
                                                    <td>
                                                        <a href="#modalEditDataPart{{ $row->id }}" data-toggle="modal"
                                                            class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>
                                                            Edit</a>
                                                        <a href="#modalHapusDataPart{{ $row->id }}" data-toggle="modal"
                                                            class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                                                            Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddDataPart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Part</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" enctype="multipart/form-data" action="/datapart/simpan">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>No Part</label>
                            <input type="text" class="form-control" name="no_part" placeholder="No Part ..."></input>
                        </div>
                        <div class="form-group">
                            <label>Nama Part</label>
                            <input type="text" class="form-control" name="nama_part" placeholder="Nama Part ..."></input>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" class="form-control" name="stok" placeholder="Stok ..."></input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($datapart as $d)
        <div class="modal fade" id="modalEditDataPart{{ $d->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Part</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" enctype="multipart/form-data" action="/datapart/{{ $d->id }}/update">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" value="{{ $d->id }}" name="id" required>
                            <div class="form-group">
                                <label>No Part</label>
                                <input type="text" class="form-control" value="{{ $d->no_part }}" name="no_part"
                                    placeholder="No Part ..."></input>
                            </div>
                            <div class="form-group">
                                <label>Nama Part</label>
                                <input type="text" class="form-control" value="{{ $d->nama_part }}" name="nama_part"
                                    placeholder="Nama Part ..."></input>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" class="form-control" value="{{ $d->stok }}" name="stok"
                                    placeholder="Stok ..."></input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($datapart as $g)
        <div class="modal fade" id="modalHapusDataPart{{ $g->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Part</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="GET" enctype="multipart/form-data" action="/datapart/{{ $g->id }}/delete">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" value="{{ $g->id }}" name="id" required>
                            <div class="form-group">
                                <h4>Apakah anda ingin menghapus data ini?</h4>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @endsection
    @push('after-script')
    @include('sweetalert::alert')
        <script>
            $(document).ready(function() {
                $("#add-row").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
            });
        </script>

    @endpush
