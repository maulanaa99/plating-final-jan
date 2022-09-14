@extends('layout.master')
@push('page-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Add Barang Masuk</div>
                            </div>

                            <form method="POST", enctype="multipart/form-data" action="/stokin/simpan">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>No Stok In</label>
                                        <input type="text" class="form-control" id="no_stok_in"
                                            placeholder="No Stok In ..." name="no_stok_in" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Part</label>
                                        <select class="form-control js-example-basic-single" name="id_datapart" id="id_datapart"
                                            required>
                                            <option value="" hidden>-- Pilih Barang --</option>
                                            @foreach ($datapart as $d)
                                                <option value="{{ $d->id }}">{{ $d->nama_part }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah Barang</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="Jumlah Barang ..."
                                                name="jml_part_masuk" id="jml_part_masuk" required>
                                            <div class="input-group-pretend">
                                                <span class="input-group-text" id="basic-addon2">Unit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-action">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i>
                                        Submit</button>
                                    <a href="/brg_msk" class="btn btn-danger"> <i class="fa fa-undo"></i> Cancel</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('after-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
