@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Master Data Part</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('master.simpan') }}" method="POST" class="form-master">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">No. Part</label>
                                                    <input type="text" id="no_part" name="no_part"
                                                        placeholder="ex: 1......"
                                                        class="@error('no_part') is-invalid @enderror form-control">
                                                    @error('no_part')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Part Name</label>
                                                    <input type="text" id="part_name" name="part_name"
                                                        placeholder="ex: D14N MLDG, Rad Grille, UPR..."
                                                        class="@error('part_name') is-invalid @enderror form-control">
                                                    @error('part_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Katalis</label>
                                                    <input type="text" id="katalis" name="katalis" placeholder="ex: K1"
                                                        class="@error('katalis') is-invalid @enderror form-control">
                                                    @error('katalis')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Channel</label>
                                                    <input type="text" id="channel" name="channel"
                                                        placeholder="ex: 144"
                                                        class="@error('channel') is-invalid @enderror form-control">
                                                    @error('channel')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Grade Color</label>
                                                    <input type="text" id="grade_color" name="grade_color"
                                                        placeholder="ex: Cr 6+"
                                                        class="@error('grade_color') is-invalid @enderror form-control">
                                                    @error('grade_color')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Qty Bar</label>
                                                    <input type="text" id="qty_bar" name="qty_bar"
                                                        value="{{ 0 }}"
                                                        class="@error('qty_bar') is-invalid @enderror form-control">
                                                    @error('qty_bar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Stok</label>
                                                    <input type="text" id="stok" name="stok"
                                                        value="{{ 0 }}"
                                                        class="@error('stok') is-invalid @enderror form-control">
                                                    @error('stok')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div class="card-footer text-center">
                                                    <a href="#" class="tombol-simpan"><button
                                                            class="btn btn-primary mr-1" type="submit"><i class="fas fa-save"></i> Submit</button></a>
                                                    <button class="btn btn-danger mr-1" type="reset"><i class="fas fa-trash-restore"></i> Reset</button>
                                                    <a href="{{ route('master') }}"
                                                        class="btn btn-icon icon-left btn-warning"><i
                                                            class="fas fa-arrow-left"></i> Kembali</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
@endpush
