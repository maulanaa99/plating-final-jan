<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\Racking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RackingController extends Controller
{
    //tampil data
    public function index()
    {
        $racking = DB::table('racking')
            ->join('masterdata', 'masterdata.no_part', '=', 'racking.no_part')
            ->orderBy('tanggal', 'desc')->orderBy('waktu_in', 'desc')
            ->get();
        return view('racking.index', ['racking' => $racking]);
    }

    //tambah data
    public function tambah()
    {
        return view('racking.racking-tambah');
    }

    //simpan data
    public function simpan(Request $request)
    {
        DB::table('racking')->insert([
            'tanggal' => $request->tanggal,
            'no_bar' => $request->no_bar,
            'no_part' => $request->no_part,
            'waktu_in' => $request->waktu_in,
            'tgl_lot_prod_mldg' => $request->tgl_lot_prod_mldg,
            'cycle' => $request->cycle
        ]);
        return redirect()->route('racking')->with('message', 'Data berhasil disimpan');
    }

    //edit data
    public function edit($id)
    {
        
        // return view('racking.racking-edit',compact('racking'));
        $rackings = DB::table('racking')
        ->select('racking.racking_id')->where('racking_id', $id)->first();
        return view('racking.racking-edit', ['racking' => $rackings]);


    }

    //hapus data
    public function delete($id)
    {

        // DB::delete('racking');
        // $racking = Racking::find($id);
        // $racking->delete();
        DB::table('racking')
        ->select('racking.racking_id')->where('racking_id', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    //update data
    public function update(Request $request, $id)
    {
        DB::table('racking')->where('id', $request->id)->update([
            'tanggal' => $request->tanggal,
            'no_bar' => $request->no_bar,
            'no_part' => $request->no_part,
            'waktu_in' => $request->waktu_in,
            'tgl_lot_prod_mldg' => $request->tgl_lot_prod_mldg,
            'cycle' => $request->cycle
        ]);
        return redirect()->route('racking')->with('message', 'Data berhasil di update');
    }

    public function autocomplete($id)
    {
        if (empty($id)) {
            return [];
        }
        $datas = DB::table('masterdata')
            ->join('racking', 'racking.no_part', '=', 'masterdata.no_part')
            ->where('masterdata.part_name', 'LIKE', "$id%")
            ->limit(25)
            ->get();

        return $datas;  
    }
}
