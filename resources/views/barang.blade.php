@extends('layout.master')
@section('title')
    Data Barang
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Barang > Barang</li>
@endsection
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <div class="card-header">
        <div class="row float-right">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('barang.tambah') }}" class="btn btn-icon icon-left btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data</a>
                <a href="{{ route('barang.export') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                {{-- notifikasi form validasi --}}
                @if ($errors->has('file'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif

                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $sukses }}</strong>
                    </div>
                @endif

                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>

                <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="barang/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($barangs as $no => $barang)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->jumlah_barang }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
    @push('page-script')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
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
    @endpush
