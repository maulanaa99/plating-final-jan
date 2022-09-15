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
                    <form id="quickForm" action="{{ route('kensa.simpan') }}" method="POST" class="form-master">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" value="<?= url('/') ?>" id="base_path" />
                                            <div class="form-group">
                                                <label>Tanggal Jam</label>
                                                <input type="datetime-local" name="tanggal_k"
                                                    value="<?= date('Y-m-d h:i:s') ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Part Name</label>
                                                <select class="form-control masterdata-js" name="id_masterdata"
                                                    id="id_masterdata">
                                                    <option value="" hidden>--Pilih Barang--</option>
                                                    @foreach ($masterdata as $d)
                                                        <option value="{{ $d->id }}">{{ $d->part_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div id="detail_part"></div>

                                        {{-- <div class="col-md-6">
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

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <Label> Qty Bar</Label>
                                                <div class="input-group">
                                                    <input type="text" id="qty_bar" name="qty_bar"
                                                        value="{{ old('qty_bar') }}" onkeyup="sum();" class="form-control">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Pcs </span>
                                                    </div>
                                                </div>
                                            </div> --}}



                                        <div class="col-md-6">
                                            <div class="row">
                                                <p class="font-italic"> <b> NG Plating </b> </p>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Nikel</Label>
                                                        <input type="number" id="nikel" name="nikel" onkeyup="sum();"
                                                            value="{{ 0 }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Butsu</Label>
                                                        <input type="number" id="butsu" name="butsu" onkeyup="sum();"
                                                            value="{{ 0 }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Hadare</Label>
                                                        <input type="number" id="hadare" name="hadare" onkeyup="sum();"
                                                            value="{{ 0 }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Hage</Label>
                                                        <input type="number" id="hage" name="hage" onkeyup="sum();"
                                                            value="{{ 0 }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Moyo</Label>
                                                        <input type="number" id="moyo" name="moyo" onkeyup="sum();"
                                                            value="{{ 0 }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Fukure</Label>
                                                        <input type="number" id="fukure" name="fukure" onkeyup="sum();"
                                                            value="{{ 0 }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Crack</Label>
                                                        <input type="number" id="crack" name="crack" onkeyup="sum();"
                                                            value="{{ 0 }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Henkei</Label>
                                                        <input type="number" id="henkei" name="henkei" onkeyup="sum();"
                                                            value="{{ 0 }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Hanazaki</Label>
                                                        <input type="number" id="hanazaki" name="hanazaki"
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Kizu</Label>
                                                        <input type="number" id="kizu" name="kizu"
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Kaburi</Label>
                                                        <input type="number" id="kaburi" name="kaburi"
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Other</Label>
                                                        <input type="number" id="other" name="other"
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
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
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Regas</Label>
                                                        <input type="number" id="regas" name="regas"
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Silver</Label>
                                                        <input type="number" id="silver" name="silver"
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Hike</Label>
                                                        <input type="number" id="hike" name="hike"
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Burry</Label>
                                                        <input type="number" id="burry" name="burry"
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <Label>Others</Label>
                                                        <input type="number" id="others" name="others"
                                                            onkeyup="sum();" value="{{ 0 }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <Label>Total OK</Label>
                                                <div class="input-group">
                                                    <input type="number" id="total_ok" name="total_ok"
                                                        onkeyup="sum();" class="form-control">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Pcs </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <Label>Total NG</Label>
                                                <div class="input-group">
                                                    <input type="number" id="hasil" name="total_ng"
                                                        class="form-control">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Pcs </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="row">
                                                <Label>%Total OK</Label>
                                                <div class="input-group">
                                                    <input type="text" id="persenok" name="p_total_ok"
                                                        onkeyup="sum()" class="form-control">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> % </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="row">
                                                <Label>%Total NG</Label>
                                                <div class="input-group">
                                                    <input type="text" id="persenng" name="p_total_ng"
                                                        onkeyup="sum()" class="form-control">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> % </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="container mt-3 text-center">
                                        <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-save"></i>
                                            Submit</button>
                                        <button class="btn btn-danger mr-1" type="reset"> <i
                                                class="fa fa-trash-restore"></i> Reset</button>
                                        <a href="{{ route('kensa') }}" class="btn btn-icon icon-left btn-warning">
                                            <i class="fas fa-arrow-left"></i> Kembali</a>
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
@endpush

@push('after-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.masterdata-js').select2();

        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#id_masterdata').change(function() {
                var id_masterdata = $('#id_masterdata').val();
                $.ajax({
                    type: "GET",
                    url: "/kensa/ajax",
                    data: "id_masterdata=" + id_masterdata,
                    cache: false,
                    success: function(data) {
                        $('#detail_part').html(data);
                    }
                });
            });
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
                        $('#qty_bar').val(data.qty_bar);
                    }
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
            var result = parseInt(nikel) + parseInt(butsu) + parseInt(hadare) + parseInt(hage) + parseInt(moyo) + parseInt(
                    fukure) + parseInt(crack) + parseInt(henkei) + parseInt(hanazaki) + parseInt(kizu) + parseInt(kaburi) +
                parseInt(other) + parseInt(gores) + parseInt(regas) + parseInt(silver) + parseInt(hike) + parseInt(burry) +
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
