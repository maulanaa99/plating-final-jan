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
                        <h3 class="card-title">Tambah Data Kensa</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('kensa.update', $kensa->id) }}" method="POST"
                        class="form-master">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="hidden" value="<?= url('/') ?>" id="base_path" />
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="date" name="tanggal_k"
                                                        @if (old('tanggal_k')) value="{{ old('tanggal_k') }}"
                                                        @else
                                                            value="{{ $kensa->tanggal_k }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Jam</label>
                                                    <input type="time" name="waktu_k"
                                                        @if (old('waktu_k')) value="{{ old('waktu_k') }}"
                                                        @else
                                                            value="{{ $kensa->waktu_k }}" @endif
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Part Name</label>
                                                    <select class="form-control masterdata-js" name="id_masterdata"
                                                        id="id_masterdata">
                                                        <option value="" hidden>--Pilih Part--</option>
                                                        @foreach ($masterdata as $d)
                                                            <option
                                                                {{ old('id_masterdata', $kensa->id_masterdata) == $d->id ? 'selected' : '' }}
                                                                value="{{ $d->id }}">{{ $d->part_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <input type="hidden" id="no_part" name="no_part" value=""
                                                    class="form-control typeahead" readonly>
                                                <input type="hidden" id="part_name" name="part_name" value=""
                                                    class="typeahead form-control" placeholder="Masukkan Nama Part"
                                                    readonly>


                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label>Stok BC</label>
                                                        <input type="text" name="stok_bc" id="stok_bc" readonly
                                                            @if (old('stok_bc')) value="{{ old('stok_bc') }}"
                                                    @else
                                                        value="" @endif
                                                            class="form-control" placeholder="Masukkan No. Bar">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>No. Bar</label>
                                                        <input type="text" name="no_bar"
                                                            @if (old('no_bar')) value="{{ old('no_bar') }}"
                                                    @else
                                                        value="{{ $kensa->no_bar }}" @endif
                                                            class="form-control" placeholder="Masukkan No. Bar">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <Label> Qty Bar</Label>
                                                        <input type="text" id="qty_bar" name="qty_bar" onkeyup="sum();"
                                                            @if (old('qty_bar')) value="{{ old('qty_bar') }}"
                                                    @else
                                                        value="{{ $kensa->qty_bar }}" @endif
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Cycle</label>
                                                        <select name="cycle" class="form-control">
                                                            <option value="">----Pilih Cycle----</option>
                                                            <option value="C1"
                                                                {{ old('cycle', $kensa->cycle) == 'C1' ? 'selected' : '' }}>
                                                                C1</option>
                                                            <option value="C2"
                                                                {{ old('cycle', $kensa->cycle) == 'C2' ? 'selected' : '' }}>
                                                                C2</option>
                                                            <option value="CS"
                                                                {{ old('cycle', $kensa->cycle) == 'CS' ? 'selected' : '' }}>
                                                                CS</option>
                                                            <option value="FS"
                                                                {{ old('cycle', $kensa->cycle) == 'FS' ? 'selected' : '' }}>
                                                                FS</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <p class="font-italic"> <b> NG Plating </b> </p>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Nikel</Label>
                                                            <input type="number" id="nikel" name="nikel"
                                                                onkeyup="sum()"
                                                                @if (old('nikel')) value="{{ old('nikel') }}"
                                                            @else
                                                                value="{{ $kensa->nikel }}" @endif
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Butsu</Label>
                                                            <input type="number" id="butsu" name="butsu"
                                                                onkeyup="sum();"
                                                                @if (old('butsu')) value="{{ old('butsu') }}"
                                                            @else
                                                                value="{{ $kensa->butsu }}" @endif
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Hadare</Label>
                                                            <input type="number" id="hadare" name="hadare"
                                                                @if (old('hadare')) value="{{ old('hadare') }}"
                                                            @else
                                                                value="{{ $kensa->hadare }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Hage</Label>
                                                            <input type="number" id="hage" name="hage"
                                                                @if (old('hage')) value="{{ old('hage') }}"
                                                            @else
                                                                value="{{ $kensa->hage }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Moyo</Label>
                                                            <input type="number" id="moyo" name="moyo"
                                                                @if (old('moyo')) value="{{ old('moyo') }}"
                                                            @else
                                                                value="{{ $kensa->moyo }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Fukure</Label>
                                                            <input type="number" id="fukure" name="fukure"
                                                                @if (old('fukure')) value="{{ old('fukure') }}"
                                                            @else
                                                                value="{{ $kensa->fukure }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Crack</Label>
                                                            <input type="number" id="crack" name="crack"
                                                                @if (old('crack')) value="{{ old('crack') }}"
                                                            @else
                                                                value="{{ $kensa->crack }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Henkei</Label>
                                                            <input type="number" id="henkei" name="henkei"
                                                                @if (old('henkei')) value="{{ old('henkei') }}"
                                                            @else
                                                                value="{{ $kensa->henkei }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Hanazaki</Label>
                                                            <input type="number" id="hanazaki" name="hanazaki"
                                                                @if (old('hanazaki')) value="{{ old('hanazaki') }}"
                                                            @else
                                                                value="{{ $kensa->hanazaki }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Kizu</Label>
                                                            <input type="number" id="kizu" name="kizu"
                                                                @if (old('kizu')) value="{{ old('kizu') }}"
                                                            @else
                                                                value="{{ $kensa->kizu }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Kaburi</Label>
                                                            <input type="number" id="kaburi" name="kaburi"
                                                                @if (old('kaburi')) value="{{ old('kaburi') }}"
                                                            @else
                                                                value="{{ $kensa->kaburi }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Shiromoya</Label>
                                                            <input type="number" id="shiromoya" name="shiromoya"
                                                                onchange="sum();" value="{{ 0 }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Shimi</Label>
                                                            <input type="number" id="shimi" name="shimi"
                                                                onchange="sum();" value="{{ 0 }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Pitto</Label>
                                                            <input type="number" id="pitto" name="pitto"
                                                                onchange="sum();" value="{{ 0 }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Other</Label>
                                                            <input type="number" id="other" name="other"
                                                                @if (old('other')) value="{{ old('other') }}"
                                                            @else
                                                                value="{{ $kensa->other }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <p class="font-italic"> <b> NG Molding </b> </p>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Gores</Label>
                                                            <input type="number" id="gores" name="gores"
                                                                @if (old('gores')) value="{{ old('gores') }}"
                                                            @else
                                                                value="{{ $kensa->gores }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Regas</Label>
                                                            <input type="number" id="regas" name="regas"
                                                                @if (old('regas')) value="{{ old('regas') }}"
                                                            @else
                                                                value="{{ $kensa->regas }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Silver</Label>
                                                            <input type="number" id="silver" name="silver"
                                                                @if (old('silver')) value="{{ old('silver') }}"
                                                            @else
                                                                value="{{ $kensa->silver }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Hike</Label>
                                                            <input type="number" id="hike" name="hike"
                                                                @if (old('hike')) value="{{ old('hike') }}"
                                                            @else
                                                                value="{{ $kensa->hike }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Burry</Label>
                                                            <input type="number" id="burry" name="burry"
                                                                @if (old('burry')) value="{{ old('burry') }}"
                                                            @else
                                                                value="{{ $kensa->burry }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <Label>Others</Label>
                                                            <input type="number" id="others" name="others"
                                                                @if (old('others')) value="{{ old('others') }}"
                                                            @else
                                                                value="{{ $kensa->others }}" @endif
                                                                onkeyup="sum();" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <Label>Total OK</Label>
                                                        <input type="number" id="total_ok" name="total_ok"
                                                            @if (old('total_ok')) value="{{ old('total_ok') }}"
                                                        @else
                                                            value="{{ $kensa->total_ok }}" @endif
                                                            onkeyup="sum();" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <Label>Total NG</Label>
                                                        <input type="number" id="hasil" name="total_ng"
                                                            @if (old('total_ng')) value="{{ old('total_ng') }}"
                                                        @else
                                                            value="{{ $kensa->total_ng }}" @endif
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <Label>%Total OK</Label>
                                                        <input type="text" id="persenok" name="p_total_ok"
                                                            @if (old('p_total_ok')) value="{{ old('p_total_ok') }}"
                                                        @else
                                                            value="{{ $kensa->p_total_ok }}" @endif
                                                            onkeyup="sum()" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <Label>%Total NG</Label>
                                                        <input type="text" id="persenng" name="p_total_ng"
                                                            @if (old('p_total_ng')) value="{{ old('p_total_ng') }}"
                                                        @else
                                                            value="{{ $kensa->p_total_ng }}" @endif
                                                            onkeyup="sum()" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="container">
                                            <div class="card-footer text-center">
                                                <button class="btn btn-primary mr-1" type="submit"> <i
                                                        class="fa fa-save"></i> Submit</button>
                                                <button class="btn btn-danger mr-1" type="reset"> <i
                                                        class="fa fa-trash-restore"></i> Reset</button>
                                                <a href="#" class="btn btn-icon icon-left btn-warning">
                                                    <i class="fas fa-arrow-left"></i> Kembali</a>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@push('after-script')
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
                    $('#channel').val(data.channel);
                    $('#qty_bar').val(data.qty_bar);
                    $('#stok_bc').val(data.stok_bc);
                },
                error: function() {

                }
            });
        });
    </script>

    <script>
        function sum() {
            var nikel = document.getElementById('nikel').value;
            var butsu = document.getElementById('butsu').value;
            var hadare = document.getElementById('hadare').value;
            var hage = document.getElementById('hage').value;
            var moyo = document.getElementById('moyo').value;
            var fukure = document.getElementById('fukure').value;
            var crack = document.getElementById('crack').value;
            var henkei = document.getElementById('henkei').value;
            var hanazaki = document.getElementById('hanazaki').value;
            var kizu = document.getElementById('kizu').value;
            var kaburi = document.getElementById('kaburi').value;
            var other = document.getElementById('other').value;
            var gores = document.getElementById('gores').value;
            var regas = document.getElementById('regas').value;
            var silver = document.getElementById('silver').value;
            var hike = document.getElementById('hike').value;
            var burry = document.getElementById('burry').value;
            var others = document.getElementById('others').value;
            var totalok = document.getElementById('total_ok').value;
            var qtybar = document.getElementById('qty_bar').value;
            var persenok = document.getElementById('persenok').value;
            var persenng = document.getElementById('persenng').value;
            var result = parseInt(nikel) + parseInt(butsu) + parseInt(hadare) + parseInt(hage) + parseInt(moyo) +
                parseInt(
                    fukure) + parseInt(crack) + parseInt(henkei) + parseInt(hanazaki) + parseInt(kizu) + parseInt(
                    kaburi) +
                parseInt(other) + parseInt(gores) + parseInt(regas) + parseInt(silver) + parseInt(hike) + parseInt(
                    burry) +
                parseInt(others);
            var hasil = parseInt(qtybar) - parseInt(result)
            var persenoks = (parseInt(hasil) / parseInt(qtybar)) * 100
            var persenokq = persenoks.toFixed(2);
            var persenngs = (parseInt(result) / parseInt(qtybar)) * 100
            var persenngq = persenngs.toFixed(2);
            if (!isNaN(result)) {
                document.getElementById('hasil').value = result;
                document.getElementById('total_ok').value = hasil;
                document.getElementById('persenok').value = persenokq;
                document.getElementById('persenng').value = persenngq;
            }
        }
    </script>
@endpush
