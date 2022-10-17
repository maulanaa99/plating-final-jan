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
                        <h3 class="card-title">Tambah Data Produksi Racking</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('racking_t.simpan') }}" method="POST" class="form-master">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" value="<?= url('/') ?>" id="base_path" />
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" name="tanggal_r" value="<?= date('Y-m-d') ?>"
                                                class="@error('tanggal_r') is-invalid @enderror form-control">
                                                @error('tanggal_r')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Waktu in</label>
                                                <input type="text" name="waktu_in_r" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                echo date('H:i:s'); ?>"
                                                    class="@error('waktu_in_r') is-invalid @enderror form-control">
                                                @error('waktu_in_r')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Lot Produksi Molding</label>
                                                <input type="date" name="tgl_lot_prod_mldg" value=""
                                                    class="@error('tgl_lot_prod_mldg') is-invalid @enderror form-control">
                                                @error('tgl_lot_prod_mldg')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Produksi</label>
                                                <select name="cycle"
                                                    class="@error('cycle') is-invalid @enderror form-control">
                                                    @error('cycle')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <option value="">----Pilih Cycle----</option>
                                                    <option>C1</option>
                                                    <option>C2</option>
                                                    <option>CS</option>
                                                    <option>FS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. Bar</label>
                                                <input type="text" name="no_bar" value="{{ old('no_bar') }}"
                                                    placeholder="Masukkan No. Bar"
                                                    class="@error('no_bar') is-invalid @enderror form-control">
                                                @error('no_bar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Part Name</label>
                                                <input type="text" id="part_name" name="part_name"
                                                    value="{{ old('part_name') }}" class="typeahead form-control"
                                                    placeholder="Masukkan Nama Part">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Part Number</label>
                                                <input type="text" id="no_part" name="no_part" readonly
                                                    value="{{ old('no_part') }}"
                                                    class="@error('no_part') is-invalid @enderror form-control">
                                                @error('no_part')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Katalis </label>
                                                <input type="text" id="katalis" name="katalis" readonly
                                                    value="{{ old('katalis') }}"
                                                    class="@error('katalis') is-invalid @enderror form-control">
                                                @error('katalis')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Channel </label>
                                                <input type="text" id="channel" name="channel" readonly
                                                    value="{{ old('channel') }}"
                                                    class="@error('channel') is-invalid @enderror form-control">
                                                @error('channel')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Chrome </label>
                                                <input type="text" id="grade_color" name="grade_color" readonly
                                                    value="{{ old('grade_color') }}"
                                                    class="@error('grade_color') is-invalid @enderror form-control">
                                                @error('grade_color')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <Label> Qty Bar</Label>
                                                <input type="text" id="qty_bar" name="qty_bar"
                                                    value="{{ old('qty_bar') }}"
                                                    class="@error('qty_bar') is-invalid @enderror form-control">
                                                @error('qty_bar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="container">
                                            <div class="card-footer text-center">
                                                <button class="btn btn-primary mr-1" type="submit"> <i class="fas fa-save"></i> Submit</button>
                                                <button class="btn btn-danger" type="reset"> <i class="fas fa-trash-restore"></i> Reset</button>
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
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@push('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush



@push('after-script')
    @include('sweetalert::alert')

    <script type="text/javascript">
        $(document).ready(function() {
            var basePath = $("#base_path").val();
            //Array of Values
            $("#part_name").autocomplete({
                source: function(request, cb) {
                    $.ajax({
                        url: basePath + '/masterdata/' + request.term,
                        method: 'GET',
                        dataType: 'json',
                        success: function(res) {
                            var result;
                            result = [{
                                label: 'There is no matching record found for ' +
                                    request.term,
                                value: ''
                            }];

                            console.log(res);


                            if (res.length) {
                                result = $.map(res, function(obj) {
                                    return {
                                        label: obj.part_name,
                                        value: obj.part_name,
                                        data: obj
                                    };
                                });
                            }
                            cb(result);
                        }
                    });
                },
                select: function(e, selectedData) {
                    console.log(selectedData);

                    if (selectedData && selectedData.item && selectedData.item.data) {
                        var data = selectedData.item.data;

                        $('#no_part').val(data.no_part);
                        $('#katalis').val(data.katalis);
                        $('#channel').val(data.channel);
                        $('#grade_color').val(data.grade_color);
                        $('#qty_bar').val(data.qty_bar);
                    }
                }
            });
        });
    </script>
@endpush
