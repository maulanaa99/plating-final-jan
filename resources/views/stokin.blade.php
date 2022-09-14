@extends('layout.master')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Stok In</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Data</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Stok In</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Barang Masuk</h4>
                                    <a class="btn btn-primary btn-round ml-auto" href="/stokin/tambah">
                                        <i class="fa fa-plus"></i>
                                        Add Row
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No Stok In</th>
                                                <th>Nama Part</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $no=1; @endphp
                                            @foreach ($stokin as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row->no_stok_in }}</td>
                                                    <td>{{ $row->nama_part }}</td>
                                                    <td>{{ $row->jml_part_masuk }} Unit</td>
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
@endsection

@push('after-script')
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
