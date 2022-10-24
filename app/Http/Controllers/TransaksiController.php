<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('getNamaBarang')->orderBy('id', 'desc')->get();
        return view('transaksi', compact('transaksis'));
    }
    public function create()
    {
        $id_barang = Barang::pluck('nama_barang', 'id');
        return view('transaksi-tambah', compact('id_barang'));
    }
    public function store(Request $request)
    {
        Transaksi::create($request->all());
        $this->updateBarang($request);
        return redirect('transaksi');
    }
    public function edit($id)
    {
    	$editForm = true;
        $transaksis = Transaksi::with('getNamaBarang')->find($id);
        $id_barang = Barang::pluck('nama_barang', 'id');
        return view('transaksi-tambah', compact('transaksis', 'id_barang', 'editForm'));
    }
    public function update(Request $request, $id)
    {
        $this->updateBarang($request, $id);
        $data = $request->except('_method', '_token');
        Transaksi::where('id', $id)->update($data);

        return redirect('transaksi');
    }
    public function destroy($id)
    {
        $value = Transaksi::where('id', $id);
        $barang = Barang::where('id', $value->value('id_barang'));
        if ($value->first()->jenis_transaksi == 'Masuk') {
            $barang->update(["jumlah_barang" => (int) $barang->value('jumlah_barang') - (int) $value->first()->jumlah_barang]);
        } elseif ($value->first()->jenis_transaksi == 'Keluar') {
            $barang->update(["jumlah_barang" => (int) $barang->value('jumlah_barang') + (int) $value->first()->jumlah_barang]);
        }
        Transaksi::destroy($id);
        return redirect('transaksi');
    }
    public function updateBarang($request, $idTrx = '')
    {
        $barang = Barang::where('id', $request->id_barang);
        $value = $barang->value('jumlah_barang');
        if ($idTrx != '') {
            $trx = Transaksi::where('id', $idTrx)->first();
            if ($trx->jenis_transaksi == 'Masuk') {
                $barang->update(["jumlah_barang"=>(int) $value - (int) $trx->jumlah_barang]);
            } elseif ($trx->jenis_transaksi == 'Keluar'){
                $barang->update(["jumlah_barang"=>(int) $value + (int) $trx->jumlah_barang]);
            } $value = Barang::where('id',$request->id_barang)->value('jumlah_barang');
        }
        if ($request->jenis_transaksi == 'Masuk'){
            $barang->update(["jumlah_barang"=>(int) $value + (int) $request->jumlah_barang]);
        } elseif($request->jenis_transaksi == 'Keluar'){
            $barang->update(["jumlah_barang"=>(int) $value - (int) $request->jumlah_barang]);
        }
    }
}
