@extends('layout.master')
@push('page-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endpush
@section('title')
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Kensa > Input Data Inspeksi</li>
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (isset($editForm))
        {!! Form::model('', ['url' => url('/transaksi/' . $transaksis->id), 'method' => 'put']) !!}
    @else
        {!! Form::model('', ['url' => url('/transaksi'), 'method' => 'post']) !!}
    @endif
    {{ csrf_field() }}
    <div class="form-group col-xs-12 col-lg-12">
        <label class="control-label">Nama Barang</label>
        {{ Form::select('id_barang', $id_barang, isset($transaksis->id_barang) ? $transaksis->id_barang : null, ['class' => 'form-control', 'placeholder' => 'Pilih']) }}
    </div>
    <div class="form-group col-xs-12 col-lg-12">
        <label class="control-label">Jenis Transaksi</label>
        {{ Form::select('jenis_transaksi', ['Masuk' => 'Masuk', 'Keluar' => 'Keluar'], isset($transaksis->jenis_transaksi) ? $transaksis->jenis_transaksi : null, ['class' => 'form-control', 'placeholder' => 'Pilih']) }}
    </div>
    <div class="form-group col-xs-12 col-lg-12">
        <label class="control-label">Jumlah Transaksi</label>
        {{ Form::number('jumlah_barang', isset($transaksis->jumlah_barang) ? $transaksis->jumlah_barang : null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-xs-12 col-lg-12">
        <button type="submit" class="btn btn-success">
            Simpan
        </button>
    </div>
    {!! Form::close() !!}
@endsection
