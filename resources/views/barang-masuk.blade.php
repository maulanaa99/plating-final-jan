@extends('layout.master')
@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
@endpush
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a href="{{ route('racking_t') }}">Racking</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
<div class="card-header">
    <div class="row float-right">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{ route('barangmasuk.tambah') }}" class="btn btn-icon icon-left btn-primary"><i
                    class="fas fa-plus"></i>
                Tambah Data</a>
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#importExcel"><i
                    class="fas fa-upload"></i>Import Data</a>
            <a href="#" class="btn btn-icon icon-left btn-info"><i
                    class="fas fa-download"></i>Export Data</a>
        </div>
    </div>
</div>

{{-- PENCARIAN DATA --}}
<div class="card-header">
    <div class="card-tools float-right">
        {{-- <div class="input-group input-group-sm" style="width: 150px;"> --}}
        <form class="form" method="GET" action="#">
            <div class="input-group-append">
                <input type="text" name="search" class="form-control float-right" id="search"
                    placeholder="Masukkan keyword">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- TABLE MASTERDATA --}}
<div class="card-body">
    <table class="table table-sm table-hover table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Barang</th>
            <th>QTY</th>
            <th>Tanggal Masuk</th>
            <th></th>
        </tr>
        @foreach ($barang_masuk as $row)
            <tr>
                {{-- <td>{{ $no++ }}</td> --}}
                <td>{{ $row->nama }}</td>
                <td>{{ $row->qty_masuk }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>
                    <a href="#" class="btn btn-icon btn-sm btn-warning"><i
                            class="far fa-edit"></i> Edit </a>
                    <a href="#" data-id="#"
                        class="btn btn-icon btn-sm btn-danger swal-confirm"><i class="fas fa-times"></i>
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }} "></script>
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>
@endpush

@push('after-script')
    
@endpush