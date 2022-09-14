<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\barang_masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barang_masuk = DB::table('barang_masuk')
            ->join('barang', 'barang.id', '=', 'barang_masuk.id_barang')
            ->select('barang_masuk.id_barang', 'barang.nama')
            ->get();

        $barang = Barang::all();

        return view('barang-masuk', ['barang_masuk' => $barang_masuk] );
    }

    public function tambah()
    {
        $barang = Barang::all();
        return view('barang-masuk-tambah', compact('barang'));
    }

    public function simpan(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'barang_id'        => 'required',
            'qty_masuk'        => 'required',
            'tanggal'          => 'required'
        ]);

        barang_masuk::create([
            'barang_id'         => $request->id_barang,
            'qty_masuk'         => $request->qty_masuk,
            'tanggal'           => $request->tanggal
        ]);

        $barang = Barang::find($request->id_barang);
        $barang->qty += $request->qty_masuk;
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;

        $barang->save();
        
        return redirect('barang-masuk')->with('success', 'Data berhasil disimpan');
    }
}
