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
                                                        <option value="K1"
                                                            {{ old('katalis', $masterdata->katalis) == 'K1' ? 'selected' : '' }}>
                                                            K1</option>
                                                        <option value="K2"
                                                            {{ old('katalis', $masterdata->katalis) == 'K2' ? 'selected' : '' }}>
                                                            K2</option>
                                                    </select>
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
                                                        <option value="Cr 6+"
                                                            {{ old('grade_color', $masterdata->grade_color) == 'Cr 6+' ? 'selected' : '' }}>
                                                            Cr 6+</option>
                                                        <option value="Dark 3+"
                                                            {{ old('grade_color', $masterdata->grade_color) == 'Dark 3+' ? 'selected' : '' }}>
                                                            Dark 3+</option>
                                                        <option value="Black 3+"
                                                            {{ old('grade_color', $masterdata->grade_color) == 'Black 3+' ? 'selected' : '' }}>
                                                            Black 3+</option>
                                                        <option value="Satin"
                                                            {{ old('grade_color', $masterdata->grade_color) == 'Satin' ? 'selected' : '' }}>
                                                            Satin</option>
                                                    </select>
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
                                                    <label>Qty Trolly / Qty Box</label>
                                                    <input type="text" id="qty_trolly" name="qty_trolly"
                                                        @if (old('qty_trolly')) value="{{ old('qty_trolly') }}"
                                                    @else
                                                        value="{{ $masterdata->qty_trolly }}" @endif
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
                                                        <option value="-"
                                                            {{ old('bagian', $masterdata->bagian) == '-' ? 'selected' : '' }}>
                                                            -</option>
                                                        <option value="LH"
                                                            {{ old('bagian', $masterdata->bagian) == 'LH' ? 'selected' : '' }}>
                                                            LH</option>
                                                        <option value="RH"
                                                            {{ old('bagian', $masterdata->bagian) == 'RH' ? 'selected' : '' }}>
                                                            RH</option>
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
                                                        <option value="ASSEMBLY"
                                                            {{ old('next_process', $masterdata->next_process) == 'ASSEMBLY' ? 'selected' : '' }}>
                                                            ASSEMBLY</option>
                                                        <option value="PAINTING"
                                                            {{ old('next_process', $masterdata->next_process) == 'PAINTING' ? 'selected' : '' }}>
                                                            PAINTING</option>
                                                        <option value="PPIC"
                                                            {{ old('next_process', $masterdata->next_process) == 'PPIC' ? 'selected' : '' }}>
                                                            PPIC</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Model</label>
                                                    <input type="text" id="model" name="model"
                                                        @if (old('model')) value="{{ old('model') }}"
                                                    @else
                                                        value="{{ $masterdata->model }}" @endif
                                                        class="@error('model') is-invalid @enderror form-control">
                                                    @error('model')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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
