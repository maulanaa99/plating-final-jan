@extends('layout.master')
@section('title')
    Edit Data Racking Trial
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> - > Trial > Racking Trial</li>
@endsection
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
                        <h3 class="card-title">Edit Data Produksi Trial Racking</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('tr.racking.update', $racking_trial->id) }}" method="POST"
                        class="form-master">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" value="<?= url('/') ?>" id="base_path" />
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="date" name="tanggal_r"
                                                        @if (old('tanggal')) value="{{ old('tanggal_r') }}"
                                                        @else
                                                            value="{{ $racking_trial->tanggal_r }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Waktu in</label>
                                                    <input type="text" name="waktu_in_r"
                                                        @if (old('waktu_in')) value="{{ old('waktu_in_r') }}"
                                                        @else
                                                            value="{{ $racking_trial->waktu_in_r }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>Cycle</label>
                                                    <select name="cycle" class="form-control">
                                                        <option value="">----Pilih Cycle----</option>
                                                        <option value="C1"
                                                            {{ old('cycle', $racking_trial->cycle) == 'C1' ? 'selected' : '' }}>
                                                            C1</option>
                                                        <option value="C2"
                                                            {{ old('cycle', $racking_trial->cycle) == 'C2' ? 'selected' : '' }}>
                                                            C2</option>
                                                        <option value="CS"
                                                            {{ old('cycle', $racking_trial->cycle) == 'CS' ? 'selected' : '' }}>
                                                            CS</option>
                                                        <option value="FS"
                                                            {{ old('cycle', $racking_trial->cycle) == 'FS' ? 'selected' : '' }}>
                                                            FS</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Part Name</label>
                                                    <select class="form-control masterdata-js" name="id_masterdata"
                                                        id="id_masterdata">
                                                        <option value="" hidden>--Pilih Part--</option>
                                                        @foreach ($masterdata as $d)
                                                            <option
                                                                {{ old('id_masterdata', $racking_trial->id_masterdata) == $d->id ? 'selected' : '' }}
                                                                value="{{ $d->id }}">{{ $d->part_name }} ||
                                                                Ch.{{ $d->channel }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="hidden" id="part_name" name="part_name"
                                                @if (old('part_name')) value="{{ old('part_name') }}"
                                            @else
                                                value="{{ $racking_trial->part_name }}" @endif
                                                class="typeahead form-control" placeholder="Masukkan Nama Part" readonly>

                                            <input type="hidden" id="no_part" name="no_part"
                                                @if (old('no_part')) value="{{ old('no_part') }}"
                                            @else
                                                value="{{ $racking_trial->no_part }}" @endif
                                                class="typeahead form-control" placeholder="Masukkan Nama Part" readonly>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>No. Bar</label>
                                                    <input type="text" name="no_bar"
                                                        @if (old('no_bar')) value="{{ old('no_bar') }}"
                                                        @else
                                                            value="{{ $racking_trial->no_bar }}" @endif
                                                        class="form-control" placeholder="Masukkan No. Bar">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Katalis </label>
                                                    <input type="text" id="katalis" name="katalis" readonly
                                                        @if (old('katalis')) value="{{ old('katalis') }}"
                                                        @else
                                                            value="{{ $racking_trial->katalis }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Channel </label>
                                                    <input type="text" id="channel" name="channel"
                                                        @if (old('channel')) value="{{ old('channel') }}"
                                                        @else
                                                            value="{{ $racking_trial->channel }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Grade Color</label>
                                                    <input type="text" id="grade_color" name="grade_color" readonly
                                                        @if (old('grade_color')) value="{{ old('grade_color') }}"
                                                        @else
                                                            value="{{ $racking_trial->grade_color }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <Label> Qty Bar</Label>
                                                    <input type="text" id="qty_bar" name="qty_bar"
                                                        @if (old('qty_bar')) value="{{ old('qty_bar') }}"
                                                        @else
                                                            value="{{ $racking_trial->qty_bar }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <Label> Keterangan</Label>
                                                    <input type="text" id="keterangan" name="keterangan"
                                                        @if (old('keterangan')) value="{{ old('keterangan') }}"
                                                        @else
                                                            value="{{ $racking_trial->keterangan }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <a href="{{ URL::to('racking_trial/edit/' . $previous) }}"
                                                    class="btn btn-outline-secondary"> <i class="fas fa-arrow-left"></i>
                                                    Previous</a>
                                                <button class="btn btn-primary mr-1" type="submit"> <i
                                                        class="fas fa-save"></i> Submit</button>
                                                <button class="btn btn-danger" type="reset"> <i
                                                        class="fas fa-trash-restore"></i> Reset</button>
                                                <a href="{{ route('tr.racking') }}"
                                                    class="btn btn-icon icon-left btn-warning"><i
                                                        class="fas fa-arrow-left"></i> Kembali</a>
                                                <a href="{{ URL::to('racking_trial/edit/' . $next) }}"
                                                    class="btn btn-outline-success"> Next <i
                                                        class="fas fa-arrow-right"></i></a>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@push('after-script')
    @include('sweetalert::alert');

    <script type="text/javascript">
        $(document).ready(function() {
            $('.masterdata-js').select2();
            $('#id_masterdata').trigger('change');
        });

        $(document).on('change', '#id_masterdata', function() {
            var id_masterdata = $(this).val();
            var a = $(this).parent();
            $.ajax({
                type: 'get',
                url: '{{ route('cariPart') }}',
                data: {
                    'id': id_masterdata
                },
                success: function(data) {
                    console.log(id_masterdata);
                    $('#no_part').val(data.no_part);
                    $('#part_name').val(data.part_name);
                    $('#katalis').val(data.katalis);
                    $('#grade_color').val(data.grade_color);
                    // $('#channel').val(data.channel);
                    $('#qty_bar').val(data.qty_bar);
                    $('#stok_bc').val(data.stok_bc);
                },
                error: function() {

                }
            });
        });
    </script>
@endpush
