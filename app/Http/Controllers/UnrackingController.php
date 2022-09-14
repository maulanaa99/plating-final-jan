<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\Unracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnrackingController extends Controller
{
    //tampil data
    public function index()
    {
        $unracking = DB::table('unracking')
            ->join('masterdata', 'masterdata.no_part', '=', 'unracking.no_part')
            ->orderBy('tanggal', 'desc')->orderBy('waktu_in', 'desc')
            ->get();
        return view('unracking.index', ['unracking' => $unracking]);
    }

    //tambah data
    public function tambah()
    {
        return view('unracking.unracking-tambah');
    }

    //simpan data
    public function simpan(Request $request)
    {
        DB::table('unracking')->insert([
            'tanggal' => $request->tanggal,
            'no_bar' => $request->no_bar,
            'no_part' => $request->no_part,
            'waktu_in' => $request->waktu_in,
            'tgl_lot_prod_mldg' => $request->tgl_lot_prod_mldg,
            'cycle' => $request->cycle
        ]);
        return redirect()->route('unracking')->with('message', 'Data berhasil disimpan');
    }

    //edit data
    public function edit($id)
    {
        $unracking = DB::table('unracking')->where('id', $id)->first();
        return view('unracking.unracking-edit', ['unracking' => $unracking]);
    }

    //hapus data
    public function delete($id)
    {

        // DB::delete('racking');
        $unracking = Unracking::find($id);
        $unracking->delete();
        DB::table('unracking')->where('unracking_id', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    //update data
    public function update(Request $request, $id)
    {
        DB::table('unracking')->where('id', $request->id)->update([
            'tanggal' => $request->tanggal,
            'no_bar' => $request->no_bar,
            'no_part' => $request->no_part,
            'waktu_in' => $request->waktu_in
        ]);
        return redirect()->route('unracking')->with('message', 'Data berhasil di update');
    }

    public function autocomplete1(Request $request)
    {
        $unrackingg = MasterData::select("part_name as value", "id")
            ->where('part_name', 'LIKE', '%'.$request->get('part_name').'%')
            ->limit(25)
            ->get();

        return $unrackingg;  
    }
}
