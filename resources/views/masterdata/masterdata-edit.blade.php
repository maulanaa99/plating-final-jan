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
                    <form id="quickForm" action="{{ route('master.update', $masterdata->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> No. Part</label>
                                                    <input type="text" id="no_part" name="no_part"
                                                        @if (old('no_part')) value="{{ old('no_part') }}"
                                                        @else
                                                            value="{{ $masterdata->no_part }}" @endif
                                                        placeholder="ex: 1......" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Part Name</label>
                                                    <input type="text" id="part_name" name="part_name"
                                                        @if (old('part_name')) value="{{ old('part_name') }}"
                                                    @else
                                                        value="{{ $masterdata->part_name }}" @endif
                                                        placeholder="ex: D14N MLDG, Rad Grille, UPR..."
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Katalis</label>
                                                    <input type="text" id="katalis" name="katalis"
                                                        @if (old('katalis')) value="{{ old('katalis') }}"
                                                    @else
                                                        value="{{ $masterdata->katalis }}" @endif
                                                        placeholder="ex: K1" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Channel</label>
                                                    <input type="text" id="channel" name="channel"
                                                        @if (old('channel')) value="{{ old('channel') }}"
                                                    @else
                                                        value="{{ $masterdata->channel }}" @endif
                                                        placeholder="ex: 144" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Grade Color</label>
                                                    <input type="text" id="grade_color" name="grade_color"
                                                        @if (old('grade_color')) value="{{ old('grade_color') }}"
                                                    @else
                                                        value="{{ $masterdata->grade_color }}" @endif
                                                        placeholder="ex: Cr 6+" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Qty Bar</label>
                                                    <input type="text" id="qty_bar" name="qty_bar"
                                                        @if (old('qty_bar')) value="{{ old('qty_bar') }}"
                                                    @else
                                                        value="{{ $masterdata->qty_bar }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Stock</label>
                                                    <input type="text" id="stok" name="stok"
                                                        @if (old('stok')) value="{{ old('stok') }}"
                                                    @else
                                                        value="{{ $masterdata->stok }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div class="card-footer text-center">
                                                    <button class="btn btn-primary mr-1" type="submit"> Submit</button>
                                                    <button class="btn btn-danger" type="reset"> Reset</button>
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

@push('after-script')
    @include('sweetalert::alert')
    {{-- <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#quickForm').validate({
                rules: {
                    no_part: {
                        required: true
                    },
                    part_name: {
                        required: true
                    },
                    katalis: {
                        required: true
                    },
                    channel: {
                        required: true
                    },
                    grade_color: {
                        required: true
                    },
                    qty_bar: {
                        required: true
                    },
                },
                messages: {
                    no_part: {
                        required: "No Part tidak boleh kosong"
                    },
                    part_name: {
                        required: "Nama part tidak boleh kosong"
                    },
                    katalis: {
                        required: "Katalis tidak boleh kosong"
                    },
                    channel: {
                        required: "Channel tidak boleh kosong"
                    },
                    grade_color: {
                        required: "Grade color tidak boleh kosong"
                    },
                    qty_bar: {
                        required: "Quantity per bar tidak boleh kosong"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script> --}}
@endpush
