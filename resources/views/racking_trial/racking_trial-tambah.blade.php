@extends('layout.master')

@section('title')
    Tambah Data Trial Racking
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> - >  <a href="#">Trial</a>  > <a href="{{ route('tr.racking') }}">Racking Trial</a> > Tambah</li>
@endsection

@push('page-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
    <style>
        /* untuk menghilangkan spinner  */
        .spinner {
            display: none;
        }
    </style>
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
                    <form id="quickForm" action="{{ route('tr.racking.simpan') }}" method="POST" class="form-master">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>No</label>
                                                <input type="text" readonly class="form-control" value="{{ $hit_data_racking_trial + 1 }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="hidden" value="<?= url('/') ?>" id="base_path" />
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" name="tanggal_r" value="<?= date('Y-m-d') ?>"
                                                    class="@error('tanggal_r')
is-invalid
@enderror form-control">
                                                @error('tanggal_r')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Waktu in</label>
                                                <input type="time" name="waktu_in_r" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                echo date('H:i:s'); ?>"
                                                    class="@error('waktu_in_r') is-invalid @enderror form-control">
                                                @error('waktu_in_r')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Cycle</label>
                                                <select name="cycle"
                                                    class="@error('cycle') is-invalid @enderror form-control">
                                                    @error('cycle')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <option>C1</option>
                                                    <option>C2</option>
                                                    <option>CS</option>
                                                    <option>FS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Part Name</label>
                                                <select class="form-control" style="width: 100%;" name="id_masterdata"
                                                    id="id_masterdata">
                                                    <option value="" hidden>--Pilih Part--</option>
                                                    @foreach ($masterdata as $d)
                                                        <option value="{{ $d->id }}">{{ $d->part_name }} ||
                                                            Ch.{{ $d->channel }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. Bar</label>
                                                <input type="number" name="no_bar" value="{{ old('no_bar') }}"
                                                    placeholder="Masukkan No. Bar"
                                                    class="@error('no_bar') is-invalid @enderror form-control">
                                                @error('no_bar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <input type="hidden" id="no_part" name="no_part" value=""
                                            class="form-control typeahead" readonly>
                                        <input type="hidden" id="part_name" name="part_name" value=""
                                            class="typeahead form-control" placeholder="Masukkan Nama Part" readonly>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Katalis </label>
                                                <input type="text" id="katalis" name="katalis" readonly value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Channel </label>
                                                <input type="text" id="channel" name="channel" value="" required
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Chrome </label>
                                                <input type="text" id="grade_color" name="grade_color" readonly
                                                    value="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <Label> Qty Bar</Label>
                                                <input type="text" id="qty_bar" name="qty_bar" value="" required
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <Label> Keterangan</Label>
                                                <input type="text" id="keterangan" name="keterangan" value="" required
                                                    class="form-control">
                                            </div>
                                        </div>

                                        {{-- <div class="container"> --}}
                                        <div class="text-center mt-3">
                                            <button class="btn btn-primary button-prevent" type="submit">
                                                <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                                <div class="spinner"><i role="status"
                                                        class="spinner-border spinner-border-sm"></i> Simpan </div>
                                                <div class="hide-text"> <i class="fa fa-save"></i> Simpan</div>
                                            </button>
                                            <button class="btn btn-danger" type="reset"> <i
                                                    class="fas fa-trash-restore"></i> Reset</button>
                                            <a href="{{ route('tr.racking') }}"
                                                class="btn btn-icon icon-left btn-warning"><i
                                                    class="fas fa-arrow-left"></i> Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
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
            $('#id_masterdata').select2();
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
                        $('#no_part').val(data.no_part);
                        $('#part_name').val(data.part_name);
                        $('#katalis').val(data.katalis);
                        $('#grade_color').val(data.grade_color);
                        $('#channel').val(data.channel);
                        $('#qty_bar').val(data.qty_bar);
                        $('#stok_bc').val(data.stok_bc);
                    },
                    error: function() {

                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#quickForm').on('submit', function() {
                $('.button-prevent').attr('disabled', 'true');
                $('.spinner').show();
                $('.hide-text').hide();
            })
        });
    </script>
@endpush
