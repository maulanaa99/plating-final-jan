<?php

namespace App\Http\Controllers;

use App\Models\DataPart;
use Illuminate\Http\Request;

class DataPartController extends Controller
{
    public function index()
    {
        $datapart = DataPart::all();
        return view('datapart', compact('datapart'));
    }

    public function simpan(Request $request)
    {
        DataPart::create([
            'no_part' => $request->no_part,
            'nama_part' => $request->nama_part,
            'stok' => $request->stok
        ]);
        return redirect('/datapart')->with('success', 'Data Berhasil Disimpan!');
    }

    public function delete($id)
    {
        $datapart = DataPart::find($id);
        $datapart->delete();
        return redirect('/datapart')->with('success', 'Data Berhasil Dihapus');
    }

    public function update(Request $request, $id)
    {
        $datapart = DataPart::find($id);

        $datapart->no_part = $request->no_part;
        $datapart->nama_part = $request->nama_part;
        $datapart->stok = $request->stok;

        $datapart->save();
        
        return redirect('/datapart')->with('success', 'Data Berhasil di Update');
    }
}
