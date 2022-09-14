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
                        <h3 class="card-title">Tambah Data Stok In</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('stok.simpan') }}" method="POST" class="form-master">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>No Part</label>
                                                    <input type="text" name="no_part" value=""
                                                        class="@error('no_part') is-invalid @enderror form-control">
                                                    @error('no_part')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Part Name</label>
                                                    <select class="js-example-basic-single form-control" name="part_name"
                                                        id="part_name" required>

                                                        @foreach ($masterdata as $a)
                                                            <option value="{{ $a->id }}">{{ $a->part_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Stok In</label>
                                                    <input type="text" name="stok_in" value=""
                                                        class="@error('stok_in') is-invalid @enderror form-control">
                                                    @error('stok_in')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div class="card-footer text-center">
                                                    <button class="btn btn-primary mr-1" type="submit"> Submit</button>
                                                    <button class="btn btn-danger" type="reset"> Reset</button>
                                                    <a href="{{ route('stok') }}"
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

@push('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush



@push('after-script')
    @include('sweetalert::alert')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

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
