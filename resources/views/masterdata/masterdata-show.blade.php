@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- /.card-header -->
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Detail Part</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2">No Part</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->no_part }}
                                </div>
                                <label class="col-sm-2">Part Name</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->part_name }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">Katalis</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->katalis }}
                                </div>
                                <label class="col-sm-2">Channel</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->channel }}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Grade Color</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->grade_color }}
                                </div>
                                <label class="col-sm-2">Bagian</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->bagian }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Qty Bar</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->qty_bar }}
                                </div>
                                <label class="col-sm-2">Qty Trolly</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->qty_trolly }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Next Process</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->next_process }}
                                </div>
                                <label class="col-sm-2">Model</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->model }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">Stok</label>
                                <div class="col-sm-4">
                                    {{ $masterdata->stok }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">Image</label>
                                <div class="col-sm-10">
                                    <img style="max-width:700px;
                                    max-height:700px;"
                                        src="{{ !empty($masterdata->image) ? url('upload/part_images/' . $masterdata->image) : url('upload/no_images2.png') }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('master') }}" type="submit" class="btn btn-warning float-right"> <i
                                        class="fa fa-undo"></i> Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>

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
@endpush
