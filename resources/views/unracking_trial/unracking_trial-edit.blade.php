@extends('layout.master')
@push('page-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <style>
        input[type="number"] {
            font-size: 24pt;
            height: 50pt;
            ;
        }

        input[type="text"] {
            font-size: 15pt;
            height: 50pt;
            ;
        }

        input[type="date"] {
            font-size: 18pt;
            height: 50pt;
            ;
        }

        input[type="time"] {
            font-size: 18pt;
            height: 50pt;
            ;
        }

        .cycle-select {
            font-size: 18pt;
            height: 50pt;
            ;
        }

        label {
            font-size: 15pt;
        }
    </style>
@endpush
@section('title')
    Tambah Data Unracking
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Unracking > Tambah Data</li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Produksi Racking</small></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Part Name</label>
                                <input type="text" id="part_name" name="part_name"
                                    @if (old('part_name')) value="{{ old('part_name') }}"
                                                            @else
                                                                value="{{ $unracking_trial->part_name }}" @endif
                                    class="typeahead form-control" placeholder="Masukkan Nama Part" readonly>
                            </div>

                            {{-- <div class="col-md-12 mt-1">
                                <span> <b> Image </b></span>
                                <img style="max-width:100%;
                                    max-height:100%x;"
                                    src="{{ !empty($masterdata->image) ? url('upload/part_images/' . $masterdata->image) : url('upload/no_images2.png') }}">
                            </div> --}}

                            <div class="col-md-6">
                                <label for="">Tgl Racking</label>
                                <input type="date" name="tanggal_r"
                                    @if (old('tanggal')) value="{{ old('tanggal_r') }}"
                                                @else
                                                    value="{{ $unracking_trial->tanggal_r }}" @endif
                                    class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Waktu Racking</label>
                                <input type="time" name="waktu_in_r"
                                    @if (old('waktu_in')) value="{{ old('waktu_in_r') }}"
                                                @else
                                                    value="{{ $unracking_trial->waktu_in_r }}" @endif
                                    class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="">Channel</label>
                                <input type="number" id="channel" name="channel"
                                    @if (old('channel')) value="{{ old('channel') }}"
                                                    @else
                                                        value="{{ $unracking_trial->channel }}" @endif
                                    class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="">Katalis</label>
                                <input type="text" id="katalis" name="katalis"
                                    @if (old('katalis')) value="{{ old('katalis') }}"
                                                    @else
                                                        value="{{ $unracking_trial->katalis }}" @endif
                                    class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Chrome</label>
                                <input type="text" name="grade_color"
                                    @if (old('grade_color')) value="{{ old('grade_color') }}"
                                            @else
                                                value="{{ $unracking_trial->grade_color }}" @endif
                                    class="form-control" readonly>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- jquery validation -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Data Produksi Unracking</small></h3>
                    </div>

                    <form id="quickForm" action="{{ route('tr.unracking.update', $unracking_trial->id) }}" method="POST"
                        class="form-master" enctype="multipart/form-data">
                        <input type="hidden" name="next">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Part Name</label>
                                    <input type="text" id="part_name" name="part_name"
                                        @if (old('part_name')) value="{{ old('part_name') }}"
                                                    @else
                                                        value="{{ $unracking_trial->part_name }}" @endif
                                        class="typeahead form-control" placeholder="Masukkan Nama Part" readonly>
                                </div>

                                <div class="col-md-12 mt-1">
                                    <label>Image</label> <br>
                                    <img style="max-width:100%;
                                    max-height:100%;"
                                        src="{{ !empty($masterdata->image) ? url('upload/part_images/' . $masterdata->image) : url('upload/no_images2.png') }}">
                                </div>

                                <div class="col-md-6">
                                    <label>Tanggal Unracking</label>
                                    <input type="date" name="tanggal_u" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>

                                <div class="col-sm-6">
                                    <label>Waktu In Unracking</label>
                                    <input type="time" name="waktu_in_u" value="<?php date_default_timezone_set('Asia/Jakarta');
                                    echo date('H:i:s'); ?>"
                                        class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. Bar</label>
                                        <input type="number" name="no_bar"
                                            @if (old('no_bar')) value="{{ old('no_bar') }}"
                                                @else
                                                    value="{{ $unracking_trial->no_bar }}" @endif
                                            class="form-control bg-yellow" placeholder="Masukkan No. Bar" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Cycle</label>
                                        <select name="cycle" class="form-control cycle-select">
                                            <option value="">----Pilih Cycle----</option>
                                            <option value="C1"
                                                {{ old('cycle', $unracking_trial->cycle) == 'C1' ? 'selected' : '' }}>
                                                C1</option>
                                            <option value="C2"
                                                {{ old('cycle', $unracking_trial->cycle) == 'C2' ? 'selected' : '' }}>
                                                C2</option>
                                            <option value="CS"
                                                {{ old('cycle', $unracking_trial->cycle) == 'CS' ? 'selected' : '' }}>
                                                CS</option>
                                            <option value="FS"
                                                {{ old('cycle', $unracking_trial->cycle) == 'FS' ? 'selected' : '' }}>
                                                FS</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Qty</label>
                                    <input type="number" id="qty_bar" name="qty_bar"
                                        @if (old('qty_bar')) value="{{ old('qty_bar') }}"
                                                    @else
                                                        value="{{ $unracking_trial->qty_bar }}" @endif
                                        class="form-control bg-green" placeholder="Masukkan Nama Part" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Qty Aktual</label>
                                    <input type="number" id="qty_aktual" name="qty_aktual" autofocus required
                                        @if (old('qty_aktual')) value="{{ old('qty_aktual') }}"
                                                    @else
                                                        value="{{ $unracking_trial->qty_aktual }}" @endif
                                        class="typeahead form-control">
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ URL::to('unracking_trial/edit/' . $previous) }}"
                                    class="btn btn-outline-secondary"> <i class="fas fa-arrow-left"></i>
                                    Previous</a>
                                <button class="btn btn-primary" type="submit"> <i class="fas fa-save"></i>
                                    Submit</button>
                                <button class="btn btn-danger" type="reset"> <i class="fas fa-trash-restore"></i>
                                    Reset</button>
                                <a href="{{ URL::to('unracking_trial/edit/' . $next) }}" class="btn btn-outline-success">
                                    Next
                                    <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('page-script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    @endpush

    @push('after-script')
        @include('sweetalert::alert')
        <script>
            $(document).on('click', '.btn-next-submit', function(e) {
                e.preventDefault();
                $('input[name="next"]').val($(this).data('next'));
                $('form').submit();
            })
        </script>
    @endpush
