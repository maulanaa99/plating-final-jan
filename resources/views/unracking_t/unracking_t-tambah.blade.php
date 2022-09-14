@extends('layout.master')
@push('page-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Produksi Unracking</small></h3>
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
                                                <input type="date" name="tanggal_r" value="<?php echo date('Y-m-d'); ?>"
                                                    class="form-control">
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
                                                <label>No. Bar</label>
                                                <input type="text" name="no_bar" value="{{ old('no_bar') }}"
                                                    class="form-control" placeholder="Masukkan No. Bar">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. Part</label>
                                                <input type="text" id="no_part" name="no_part"
                                                    value="{{ old('no_part') }}" class="form-control typeahead">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Katalis </label>
                                                <input type="text" id="katalis" name="katalis"
                                                    value="{{ old('katalis') }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Channel </label>
                                                <input type="text" id="channel" name="channel"
                                                    value="{{ old('channel') }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Grade Color</label>
                                                <input type="text" id="grade_color" name="grade_color"
                                                    value="{{ old('grade_color') }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <Label> Qty Bar</Label>
                                                <input type="text" id="qty_bar" name="qty_bar"
                                                    value="{{ old('qty_bar') }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Waktu in</label>
                                                <input type="text" name="waktu_in_r" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                echo date('H:i:s'); ?>"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Lot Produksi Molding</label>
                                                <input type="date" name="tgl_lot_prod_mldg" value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Select</label>
                                                <select name="cycle" class="form-control">
                                                    <option value="">----Pilih Cycle----</option>
                                                    <option>Cycle 1</option>
                                                    <option>Cycle 2</option>
                                                    <option>Cooper Storage</option>
                                                    <option>Final Storage</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="container">
                                            <div class="card-footer text-center">
                                                <button class="btn btn-primary mr-1" type="submit"> Submit</button>
                                                <button class="btn btn-danger" type="reset"> Reset</button>
                                                <a href="{{ route('racking') }}"
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
                        url: basePath + '/get-employess/' + request.term,
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
