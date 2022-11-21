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
                    <form id="quickForm" action="{{ route('ngracking.update', $ngracking->id) }}" method="POST"
                        class="form-master">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" value="<?= url('/') ?>" id="base_path" />
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" name="tanggal"
                                                    @if (old('tanggal')) value="{{ old('tanggal') }}"
                                                @else
                                                    value="{{ $ngracking->tanggal }}" @endif
                                                    class="form-control">
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Waktu</label>
                                                <input type="date" name="waktu"
                                                    @if (old('waktu')) value="{{ old('waktu') }}"
                                                @else
                                                    value="{{ $ngracking->waktu }}" @endif
                                                    class="form-control">
                                            </div>
                                        </div> --}}

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Part Name</label>
                                                <select class="form-control masterdata-js" name="id_masterdata"
                                                    id="id_masterdata">
                                                    <option value="" hidden>--Pilih Part--</option>
                                                    @foreach ($masterdata as $d)
                                                        <option
                                                            {{ old('id_masterdata', $ngracking->id_masterdata) == $d->id ? 'selected' : '' }}
                                                            value="{{ $d->id }}">{{ $d->part_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" id="part_name" name="part_name"
                                            @if (old('part_name')) value="{{ old('part_name') }}"
                                        @else
                                            value="{{ $ngracking->part_name }}" @endif
                                            class="form-control" placeholder="Masukkan No. Bar">

                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Jenis NG</label>
                                                <select name="jenis_ng"
                                                    class="@error('jenis_ng') is-invalid @enderror form-control">
                                                    <option value="">--Pilih Jenis NG--</option>
                                                    <option value="Scratch"
                                                        {{ old('jenis_ng', $ngracking->jenis_ng) == 'Scratch' ? 'selected' : '' }}>
                                                        Scratch/Gores
                                                    </option>
                                                    <option value="Regas"
                                                        {{ old('jenis_ng', $ngracking->jenis_ng) == 'Regas' ? 'selected' : '' }}>
                                                        Regas
                                                    </option>
                                                    <option value="Silver"
                                                        {{ old('jenis_ng', $ngracking->jenis_ng) == 'Silver' ? 'selected' : '' }}>
                                                        Silver
                                                    </option>
                                                    <option value="Hike"
                                                        {{ old('jenis_ng', $ngracking->jenis_ng) == 'Hike' ? 'selected' : '' }}>
                                                        Hike
                                                    </option>
                                                    <option value="Burry"
                                                        {{ old('jenis_ng', $ngracking->jenis_ng) == 'Burry' ? 'selected' : '' }}>
                                                        Burry
                                                    </option>
                                                    <option value="Others"
                                                        {{ old('jenis_ng', $ngracking->jenis_ng) == 'Others' ? 'selected' : '' }}>
                                                        Others
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <Label> Quantity</Label>
                                            <div class="input-group">
                                                <input type="text" id="quantity" name="quantity"
                                                    @if (old('quantity')) value="{{ old('quantity') }}"
                                                @else
                                                    value="{{ $ngracking->quantity }}" @endif
                                                    class="form-control" placeholder="Masukkan No. Bar">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Pcs</span>
                                                </div>
                                            </div>
                                            @error('quantity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
