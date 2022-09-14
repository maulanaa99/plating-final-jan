@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Barang Masuk</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('barangmasuk.simpan') }}" method="POST" class="form-master">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Barang</label>
                                                    <select class="form-control" name="barang_id" id="">
                                                        <option value="" hidden>-- Pilih Barang --</option>
                                                        @foreach ($barang as $d )
                                                        <option value="{{ $d->id }}">{{ $d->nama }}</option>  
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="detail_barang"></div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>qty</label>
                                                    <input type="number" name="qty_masuk" value="{{ $d->qty_masuk }}"
                                                    class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input data-date-format='yyyy-mm-dd' type="date" class="form-control"
                                                        id="tanggal" name="tanggal" required>
                                                    <span class="help-block with-errors"></span>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div class="card-footer text-center">
                                                    <button class="btn btn-primary mr-1" type="submit"> Submit</button>
                                                    <button class="btn btn-danger" type="reset"> Reset</button>
                                                    <a href="{{ route('barangmasuk') }}"
                                                        class="btn btn-icon icon-left btn-warning"><i
                                                            class="fas fa-arrow-left"></i> Kembali</a>
                                                </div>
                                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div>
@endsection
