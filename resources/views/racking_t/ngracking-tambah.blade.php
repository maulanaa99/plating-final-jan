@extends('layout.master')
@push('page-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data NG Molding</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('ngracking.simpan') }}" method="POST" class="form-master">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" value="<?= url('/') ?>" id="base_path" />
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>"
                                                    class="@error('tanggal')
is-invalid
@enderror form-control">
                                                @error('tanggal')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Part Name</label>
                                                <select name="id_masterdata" id="id_masterdata"
                                                    class="@error('id_masterdata') is-invalid @enderror form-control">
                                                    <option value="" hidden>--Pilih Barang--</option>
                                                    @foreach ($masterdata as $d)
                                                        <option value="{{ $d->id }}">{{ $d->part_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('id_masterdata')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <input type="hidden" id="part_name" name="part_name" value=""
                                            class="typeahead form-control" placeholder="Masukkan Nama Part" readonly>

                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Jenis NG</label>
                                                <select name="jenis_ng"
                                                    class="@error('jenis_ng') is-invalid @enderror form-control">
                                                    <option value="">--Pilih Jenis NG--</option>
                                                    <option>Scratch/Gores</option>
                                                    <option>Regas</option>
                                                    <option>Silver</option>
                                                    <option>Hike</option>
                                                    <option>Burry</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                            @error('jenis_ng')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <Label> Quantity</Label>
                                            <div class="input-group">
                                                <input type="text" id="quantity" name="quantity"
                                                    class="@error('quantity') is-invalid @enderror
                                                    form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Pcs</span>
                                                </div>
                                            </div>
                                            @error('quantity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6" data-select2-id="30">
                                            <div class="form-group" data-select2-id="29">
                                                <label>Minimal</label>
                                                <select class="form-control select2 select2-hidden-accessible"
                                                    style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option selected="selected" data-select2-id="3">Alabama</option>
                                                    <option data-select2-id="33">Alaska</option>
                                                    <option data-select2-id="34">California</option>
                                                    <option data-select2-id="35">Delaware</option>
                                                    <option data-select2-id="36">Tennessee</option>
                                                    <option data-select2-id="37">Texas</option>
                                                    <option data-select2-id="38">Washington</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default select2-container--below"
                                                    dir="ltr" data-select2-id="2" style="width: 100%;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-bvwz-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-bvwz-container" role="textbox"
                                                                aria-readonly="true" title="Alabama">Alabama</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Disabled</label>
                                                <select class="form-control select2 select2-hidden-accessible"
                                                    disabled="" style="width: 100%;" data-select2-id="4"
                                                    tabindex="-1" aria-hidden="true">
                                                    <option selected="selected" data-select2-id="6">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--default select2-container--disabled"
                                                    dir="ltr" data-select2-id="5" style="width: 100%;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="-1" aria-disabled="true"
                                                            aria-labelledby="select2-xng7-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-xng7-container" role="textbox"
                                                                aria-readonly="true" title="Alabama">Alabama</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                        <div class="container mt-2">
                                            <div class="card-footer text-center">
                                                <button class="btn btn-primary mr-1" type="submit"> <i
                                                        class="fas fa-save"></i> Submit</button>
                                                <button class="btn btn-danger" type="reset"> <i
                                                        class="fas fa-trash-restore"></i> Reset</button>
                                                <a href="{{ route('racking_t') }}"
                                                    class="btn btn-icon icon-left btn-warning"><i
                                                        class="fas fa-arrow-left"></i> Kembali</a>
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
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@push('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush



@push('after-script')
    @include('sweetalert::alert')

    <script type="text/javascript">
        $(document).ready(function() {
            $("#id_masterdata").select2({
                allowClear: true,
                width: "resolve"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#id_masterdata', function() {
                var id_masterdata = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ route('cariPart') }}',
                    data: {
                        'id': id_masterdata
                    },
                    success: function(data) {
                        console.log(id_masterdata);
                        $('#part_name').val(data.part_name);
                    },
                    error: function() {

                    }
                });
            });
        });
    </script>

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#id_masterdata').change(function() {
                var id_masterdata = $('#id_masterdata').val();
                $.ajax({
                    type: "GET",
                    url: "/racking_t/ajax",
                    data: "id_masterdata=" + id_masterdata,
                    cache: false,
                    success: function(data) {
                        $('#detail_part').html(data);
                    }
                });
            });
        });
    </script> --}}
@endpush
