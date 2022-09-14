@extends('layout.master')
@section('content')
<div class="row page-title-header">
    <div class="col-12">
      <div class="page-header d-flex justify-content-start align-items-center">
        <div class="quick-link-wrapper d-md-flex flex-md-wrap">
          <ul class="quick-links">
            <li><a href="{{ url('barang') }}">Daftar Barang</a></li>
            <li><a href="{{ url('barang/create') }}">Barang Baru</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row modal-group">
    <div class="modal fade" id="scanModal" tabindex="-1" role="dialog" aria-labelledby="scanModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="scanModalLabel">Scan Barcode</h5>
              <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center" id="area-scan">
                    </div>
                    <div class="col-12 barcode-result" hidden="">
                        <h5 class="font-weight-bold">Hasil</h5>
                        <div class="form-border">
                            <p class="barcode-result-text"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="btn-scan-action" hidden="">
              <button type="button" class="btn btn-primary btn-sm font-weight-bold rounded-0 btn-continue">Lanjutkan</button>
              <button type="button" class="btn btn-outline-secondary btn-sm font-weight-bold rounded-0 btn-repeat">Ulangi</button>
            </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="formatModal" tabindex="-1" role="dialog" aria-labelledby="formatModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formatModalLabel">Format Upload</h5>
              <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-12 img-import-area">
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
          <div class="card card-noborder b-radius">
              <div class="card-body">
                  <form action="{{ route('barang.store') }}" method="post" name="create_form">
                      @csrf
                      <div class="form-group row">
                            <label class="col-12 font-weight-bold col-form-label">Kode Barang <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <div class="input-group">
                                    <input type="text" class="form-control number-input" name="kode_barang" placeholder="Masukkan Kode Barang">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-inverse-primary btn-sm btn-scan shadow-sm ml-2" type="button" data-toggle="modal" data-target="#scanModal"><i class="mdi mdi-crop-free"></i></button>
                                    </div>
                                </div>
                            </div>
                          <div class="col-12 error-notice" id="kode_barang_error"></div>
                      </div>
                      <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12 space-bottom">
                                <div class="row">
                                    <label class="col-12 font-weight-bold col-form-label">Nama Barang <span class="text-danger">*</span></label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang">
                                    </div>
                                  <div class="col-12 error-notice" id="nama_error"></div>
                                </div>
                            </div> 
                            <div class="col-lg-6 col-md-6 col-sm-12 space-bottom">
                                <div class="row">
                                    <label class="col-12 font-weight-bold col-form-label">Stok Barang <span class="text-danger">*</span></label>
                                    <div class="col-12">
                                        <input type="text" class="form-control number-input" name="qty" placeholder="Masukkan Stok Barang">
                                    </div>
                                  <div class="col-12 error-notice" id="qty_error"></div>
                                </div>
                            </div>
                      </div>
                      
                      <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <label class="col-12 font-weight-bold col-form-label">Harga Barang <span class="text-danger">*</span></label>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp. </span>
                                            </div>
                                            <input type="text" class="form-control number-input" name="harga" placeholder="Masukkan Harga Barang">
                                        </div>
                                    </div>
                                  <div class="col-12 error-notice" id="harga_error"></div>
                                </div>
                            </div>
                      </div>
                      <div class="row">
                          <div class="col-12 mt-2 d-flex justify-content-end">
                                <button class="btn btn-simpan btn-sm" type="submit"><i class="mdi mdi-content-save"></i> Simpan</button>
                            </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endsection