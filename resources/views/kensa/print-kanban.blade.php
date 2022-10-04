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
                        <h3 class="card-title">Print Kanban</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('kensa.kanban-simpan') }}" method="POST" class="form-master">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" value="<?= url('/') ?>" id="base_path" />
                                            <div class="form-group">
                                                <label>Tanggal Jam</label>
                                                <input type="date" name="tgl_kanban" id="tgl_kanban"
                                                    value="<?= date('Y-m-d') ?>" class="form-control">
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

                                        <div class="col-md-6">
                                            <label>Qty Trolly</label>
                                            <div class="input-group">
                                                <input type="text" id="qty_troly" name="qty_troly"
                                                    value="{{ $d->qty_troly }}" placeholder="Masukkan Qty Trolly ..." class="form-control">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Pcs </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>No Kartu</label>
                                            <input type="text" id="no_kartu" name="no_kartu" value="{{ $kode }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <label>Kirim <b class="font-italic">Assembly</b></label>
                                            <input type="text" id="kirim_assy" name="kirim_assy" onkeyup="sum();" class="form-control" value="{{ 0 }}" />
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <label>Kirim <b class="font-italic">Painting</b></label>
                                            <input type="text" id="kirim_painting" name="kirim_painting" onkeyup="sum();" class="form-control" value="{{ 0 }}" />
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <label>Total Kirim</label>
                                            <input type="text" id="total_kirim" name="total_kirim" class="form-control" 
                                                placeholder="Total Kirim ..."  readonly/>
                                        </div>
                                    </div>

                                    <div class="container mt-3 text-center">
                                        <button class="btn btn-primary mr-1" name="submit" type="submit"><i
                                                class="fa fa-save"></i>
                                            Submit</button>
                                        <button class="btn btn-danger mr-1" type="reset"> <i
                                                class="fa fa-trash-restore"></i> Reset</button>
                                        <a href="{{ route('kensa.pengiriman') }}" class="btn btn-icon icon-left btn-warning">
                                            <i class="fas fa-arrow-left"></i> Kembali</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
@include('sweetalert::alert')

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
                    url: "/kensa/print_kanban/ajax",
                    data: "id_masterdata=" + id_masterdata,
                    cache: false,
                    success: function(data) {
                        $('#detail_part').html(data);
                    }
                });
            });
        });
    </script>

    <script>
        function sum() {
              var kirim_assy = document.getElementById('kirim_assy').value;
              var kirim_painting = document.getElementById('kirim_painting').value;
              var result = parseInt(kirim_assy) + parseInt(kirim_painting);
              if (!isNaN(result)) {
                 document.getElementById('total_kirim').value = result;
              }
        }
        </script>
@endpush
