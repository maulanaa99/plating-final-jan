@extends('layout.master')
@section('title')
    Tambah Masterdata Part
@endsection
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
                                                    <label for="">Part Number</label>
                                                    <input type="text" id="no_part" name="no_part"
                                                        placeholder="Masukan Part Number .."
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
                                                        placeholder="Masukan Part Name .."
                                                        class="@error('part_name') is-invalid @enderror form-control">
                                                    @error('part_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>Katalis</label>
                                                    <select name="katalis"
                                                        class="@error('katalis') is-invalid @enderror form-control">
                                                        @error('katalis')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <option value="">----Pilih Katalis----</option>
                                                        <option>K1</option>
                                                        <option>K2</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Channel</label>
                                                    <input type="text" id="channel" name="channel"
                                                        placeholder="Masukan Channel .."
                                                        class="@error('channel') is-invalid @enderror form-control">
                                                    @error('channel')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>Chrome</label>
                                                    <select name="grade_color"
                                                        class="@error('grade_color') is-invalid @enderror form-control">
                                                        @error('grade_color')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <option value="">----Pilih Chrome----</option>
                                                        <option>Cr 6+</option>
                                                        <option>Dark 3+</option>
                                                        <option>Black 3+</option>
                                                        <option>Satin</option>
                                                    </select>
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
                                                    <label>Qty Trolly / Qty Box</label>
                                                    <input type="text" id="qty_trolly" name="qty_trolly"
                                                        value="{{ 0 }}"
                                                        class="@error('qty_trolly') is-invalid @enderror form-control">
                                                    @error('qty_trolly')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>Bagian</label>
                                                    <select name="bagian"
                                                        class="@error('bagian') is-invalid @enderror form-control">
                                                        @error('bagian')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <option value="">----Pilih Bagian----</option>
                                                        <option>-</option>
                                                        <option>LH</option>
                                                        <option>RH</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>Next Process</label>
                                                    <select name="next_process"
                                                        class="@error('next_process') is-invalid @enderror form-control">
                                                        @error('next_process')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <option value="">----Pilih Next Process----</option>
                                                        <option>PPIC</option>
                                                        <option>ASSEMBLY</option>
                                                        <option>PAINTING</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Model</label>
                                                    <input type="text" id="model" name="model"
                                                        placeholder="Masukan Model .."
                                                        class="@error('model') is-invalid @enderror form-control">
                                                    @error('model')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gambar</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input name="image" type="file" class="custom-file-input"
                                                                id="image">
                                                            <label class="custom-file-label">Choose File</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <label></label>
                                                <div class="col-sm-6">
                                                    <img id="showImage" class="rounded avatar-xla"
                                                        src="{{ asset('upload/no_image.jpg') }}">
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div class="card-footer text-center">
                                                    <a href="#" class="tombol-simpan"><button
                                                            class="btn btn-primary mr-1" type="submit"><i
                                                                class="fas fa-save"></i> Submit</button></a>
                                                    <button class="btn btn-danger mr-1" type="reset"><i
                                                            class="fas fa-trash-restore"></i> Reset</button>
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

@push('page-script')
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush

@push('after-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush
