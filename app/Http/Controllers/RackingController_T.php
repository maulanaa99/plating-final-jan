<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\racking_t;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RackingController_T extends Controller
{
    //tampil data
    public function index()
    {
        $racking = DB::table("plating")
            ->leftJoin("masterdata", function ($join) {
                $join->on("masterdata.id", "=", "plating.id_masterdata");
            })
            ->select("plating.id", "plating.id_masterdata", "plating.tanggal_r", "plating.waktu_in_r", "plating.no_bar", "plating.no_part", "plating.part_name", "plating.katalis", "plating.channel", "plating.grade_color", "plating.qty_bar", "plating.cycle", "plating.tgl_lot_prod_mldg")
            ->orderBy("tanggal_r", "desc")
            ->orderBy('waktu_in_r', 'desc')
            ->get();

        $masterdata = MasterData::all();

        return view('racking_t.racking_t', compact('racking', 'masterdata'));
    }

    //tambah data
    public function tambah()
    {
        $racking = racking_t::join('masterdata', 'masterdata.id', '=', 'plating.id_masterdata')
            ->select('plating.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->orderBy('tanggal_r', 'desc')
            ->get();

        $masterdata = MasterData::all();
        return view('racking_t.racking_t-tambah', compact('racking', 'masterdata'));
    }

    //simpan data
    public function simpan(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_r' => 'required',
            'no_bar' => 'required',
            'part_name' => 'required',
            'no_part' => 'required',
            'katalis' => 'required',
            'channel' => 'required',
            'grade_color' => 'required',
            'qty_bar' => 'required',
            'waktu_in_r' => 'required',
            'tgl_lot_prod_mldg' => 'required',
            'cycle' => 'required',
        ], [
            'tanggal_r.required' => 'Tgl Racking Harus Diisi!',
            'no_bar.required' => 'No Bar Harus Diisi!',
            'part_name.required' => 'Part Name Harus Diisi!',
            'no_part.required' => 'No Part Harus Diisi!',
            'katalis.required' => 'katalis Harus Diisi!',
            'channel.required' => 'channel Harus Diisi!',
            'grade_color.required' => 'Grade Color Harus Diisi!',
            'qty_bar.required' => 'Qty Bar Harus Diisi!',
            'waktu_in_r.required' => 'waktu in racking Harus Diisi!',
            'tgl_lot_prod_mldg.required' => 'Tgl Lot Prod Molding Harus Diisi!',
            'cycle.required' => 'cycle Harus Diisi!',

        ]);

        $racking = racking_t::create([
            'id_masterdata' => $request->id_masterdata,
            'tanggal_r' => $request->tanggal_r,
            'waktu_in_r' => $request->waktu_in_r,
            'no_bar' => $request->no_bar,
            'part_name' => $request->part_name,
            'no_part' => $request->no_part,
            'katalis' => $request->katalis,
            'channel' => $request->channel,
            'grade_color' => $request->grade_color,
            'qty_bar' => $request->qty_bar,
            'waktu_in_r' => $request->waktu_in_r,
            'tgl_lot_prod_mldg' => $request->tgl_lot_prod_mldg,
            'cycle' => $request->cycle,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now(),
        ]);
        $masterdata = MasterData::find($request->id_masterdata);
        $masterdata->stok_bc += $request->qty_bar;
        $masterdata->save();
        return redirect()->route('racking_t.tambah', compact('racking'))->with('toast_success', 'Data Berhasil Disimpan!');
    }

    //edit data
    public function edit($id)
    {
        $plating = racking_t::findOrFail($id);
        return view('racking_t.racking_t-edit', compact('plating'));
    }

    //update data
    public function update(Request $request)
    {
        DB::table('plating')->where('id', $request->id)->update([
            'tanggal_r' => $request->tanggal_r,
            'no_bar' => $request->no_bar,
            'part_name' => $request->part_name,
            'no_part' => $request->no_part,
            'katalis' => $request->katalis,
            'channel' => $request->channel,
            'grade_color' => $request->grade_color,
            'qty_bar' => $request->qty_bar,
            'waktu_in_r' => $request->waktu_in_r,
            'tgl_lot_prod_mldg' => $request->tgl_lot_prod_mldg,
            'cycle' => $request->cycle,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('racking_t')->with('message', 'Data berhasil di update');
    }

    public function ajaxRacking(Request $request)
    {
        $id_masterdata['id_masterdata'] = $request->id_masterdata;
        $ajax_racking = MasterData::where('id', $id_masterdata)->get();

        return view('racking_t.racking_t-ajax', compact('ajax_racking'));
    }
}
