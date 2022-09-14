<?php

namespace App\Http\Controllers;

use App\Models\DataPart;
use App\Models\Stock_In;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    public function index()
    {
        $stokin = Stock_In::join('datapart', 'datapart.id', '=', 'stokin.id_datapart')
            ->select('stokin.*', 'datapart.nama_part', 'datapart.stok')
            ->get();

        $datapart = DataPart::all();
        return view('stokin', compact('stokin', 'datapart'));
    }

    public function tambah()
    {
        $datapart = DataPart::all();

        return view('stokin-add', compact('datapart'));
    }

    public function simpan(Request $request)
    {
        Stock_In::create([
        'no_stok_in' => $request->no_stok_in,
        'id_datapart' => $request->id_datapart,
        'jml_part_masuk' => $request->jml_part_masuk,
        ]);
        
        $datapart = DataPart::find($request->id_datapart);
        $datapart->stok += $request->jml_part_masuk;
        $datapart->save();

        return redirect('/stokin')->with('success', 'Data Berhasil disimpan');



    }
}
