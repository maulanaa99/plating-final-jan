@extends('layout.master')
@section('title')
    Data Transaksi
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Transaksi > Transaksi</li>
@endsection
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Transaksi</h1>
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
                <a href="{{ route('transaksi.create') }}" class="btn btn-icon icon-left btn-primary">
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
                        <th>Nama Barang</th>
                        <th>Jenis Transaksi</th>
                        <th>Jumlah Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($transaksis as $no => $transaksi)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $transaksi->getNamaBarang->nama_barang }}</td>
                            <td>{{ $transaksi->jenis_transaksi }}</td>
                            <td>{{ $transaksi->jumlah_barang }}</td>
                            <td>
                                <a href="{{ route('transaksi.edit', $transaksi->id) }}"
                                    class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                {{-- <a href="{{ route('transaksi.destroy', $transaksi->id) }}"
                                    class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a> --}}
                                <a href="{{ url('transaksi/destroy/' . $transaksi->id) }}"
                                    class="btn btn-icon btn-sm btn-danger"> <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
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
