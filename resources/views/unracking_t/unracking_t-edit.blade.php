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
                        <h3 class="card-title">Tambah Data Produksi Racking</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('unracking_t.update', $plating->id) }}" method="POST"
                        class="form-master">

                        <input type="hidden" name="next">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
<label for="">asdasdas</label>
<input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-1">Tgl Racking</label>
                                        <div class="col-sm-4 bg-danger">
                                            {{ $plating->tanggal_r }}
                                        </div>
                                        <label class="col-sm-2">Part Name</label>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="hidden" value="<?= url('/') ?>" id="base_path" />
                                            <div class="form-group">
                                                <label>Tanggal Racking</label>
                                                <input type="date" name="tanggal_r"
                                                    @if (old('tanggal')) value="{{ old('tanggal_r') }}"
                                                        @else
                                                            value="{{ $plating->tanggal_r }}" @endif
                                                    class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Waktu in Racking</label>
                                                <input type="time" name="waktu_in_r"
                                                    @if (old('waktu_in')) value="{{ old('waktu_in_r') }}"
                                                        @else
                                                            value="{{ $plating->waktu_in_r }}" @endif
                                                    class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Part Name</label>
                                                <input type="text" id="part_name" name="part_name"
                                                    @if (old('part_name')) value="{{ old('part_name') }}"
                                                        @else
                                                            value="{{ $plating->part_name }}" @endif
                                                    class="typeahead form-control" placeholder="Masukkan Nama Part"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>No. Part</label>
                                                <input type="text" id="no_part" name="no_part"
                                                    @if (old('no_part')) value="{{ old('no_part') }}"
                                                        @else
                                                            value="{{ $plating->no_part }}" @endif
                                                    class="form-control typeahead" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label> Katalis </label>
                                                <input type="text" id="katalis" name="katalis"
                                                    @if (old('katalis')) value="{{ old('katalis') }}"
                                                        @else
                                                            value="{{ $plating->katalis }}" @endif
                                                    class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label> Channel </label>
                                                <input type="text" id="channel" name="channel"
                                                    @if (old('channel')) value="{{ old('channel') }}"
                                                        @else
                                                            value="{{ $plating->channel }}" @endif
                                                    class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label> Grade Color</label>
                                                <input type="text" id="grade_color" name="grade_color"
                                                    @if (old('grade_color')) value="{{ old('grade_color') }}"
                                                        @else
                                                            value="{{ $plating->grade_color }}" @endif
                                                    class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tanggal Lot Produksi Molding</label>
                                                <input type="date" name="tgl_lot_prod_mldg"
                                                    @if (old('tgl_lot_prod_mldg')) value="{{ old('tgl_lot_prod_mldg') }}"
                                                        @else
                                                            value="{{ $plating->tgl_lot_prod_mldg }}" @endif
                                                    class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>No. Bar</label>
                                                <input type="text" name="no_bar"
                                                    @if (old('no_bar')) value="{{ old('no_bar') }}"
                                                        @else
                                                            value="{{ $plating->no_bar }}" @endif
                                                    class="form-control bg-warning" placeholder="Masukkan No. Bar" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <Label> Qty Bar</Label>
                                                <input type="text" id="qty_bar" name="qty_bar" readonly
                                                    @if (old('qty_bar')) value="{{ old('qty_bar') }}"
                                                        @else
                                                           value="{{ $plating->qty_bar }}" @endif
                                                    class="form-control bg-green">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Cycle</label>
                                                <select name="cycle" class="form-control">
                                                    <option value="">----Pilih Cycle----</option>
                                                    <option value="C1"
                                                        {{ old('cycle', $plating->cycle) == 'C1' ? 'selected' : '' }}>
                                                        C1</option>
                                                    <option value="C2"
                                                        {{ old('cycle', $plating->cycle) == 'C2' ? 'selected' : '' }}>
                                                        C2</option>
                                                    <option value="CS"
                                                        {{ old('cycle', $plating->cycle) == 'CS' ? 'selected' : '' }}>
                                                        CS</option>
                                                    <option value="FS"
                                                        {{ old('cycle', $plating->cycle) == 'FS' ? 'selected' : '' }}>
                                                        FS</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tanggal Unracking</label>
                                                <input type="date" name="tanggal_u" class="form-control"
                                                    value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Waktu In Unracking</label>
                                                <input type="time" name="waktu_in_u" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                echo date('H:i:s'); ?>"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Qty Aktual</label>
                                                <input type="text" name="qty_aktual" autofocus
                                                    @if (old('qty_aktual')) value="{{ old('qty_aktual') }}"
                                                                @else
                                                                    value="{{ $plating->qty_aktual }}" @endif
                                                    class="@error('qty_aktual') is-invalid @enderror form-control">
                                                @error('qty_aktual')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <br>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Image</label>
                                                <div class="col-sm-10">
                                                    <img style="max-width:700px;
                                                max-height:700px;"
                                                        src="{{ !empty($masterdata->image) ? url('upload/part_images/' . $masterdata->image) : url('upload/no_images2.png') }}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="text-center mt-3">
                                            <a href="{{ URL::to('unracking_t/edit/' . $previous) }}"
                                                class="btn btn-outline-secondary"> <i class="fas fa-arrow-left"></i>
                                                Previous</a>
                                            <button class="btn btn-primary mr-1" type="submit"> <i
                                                    class="fas fa-save"></i> Submit</button>
                                            <button class="btn btn-danger" type="reset"> <i
                                                    class="fas fa-trash-restore"></i> Reset</button>
                                            <a href="{{ URL::to('unracking_t/edit/' . $next) }}"
                                                class="btn btn-outline-success btn-next-submit" data-next="{{ $next }}"> Next <i
                                                    class="fas fa-arrow-right"></i></a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
    <script>
        $(document).on('click','.btn-next-submit',function(e){
            e.preventDefault();
            $('input[name="next"]').val($(this).data('next'));
            $('form').submit();
        })
    </script>
@endpush
