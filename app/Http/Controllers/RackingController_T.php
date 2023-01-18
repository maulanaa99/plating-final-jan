<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\Ng_Racking;
use App\Models\Pinbosh_Tertinggal;
use App\Models\racking_t;
use App\Models\Rencana_Produksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class RackingController_T extends Controller
{

    // =================================================== RACKING =========================================================================

    //tampil data
    public function index(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $racking = DB::table('plating')
            ->leftJoin('masterdata', function ($join) {
                $join->on('masterdata.id', '=', 'plating.id_masterdata');
            })
            ->select('plating.id', 'plating.id_masterdata', 'plating.tanggal_r', 'plating.waktu_in_r', 'plating.no_bar', 'plating.no_part', 'plating.part_name', 'plating.katalis', 'plating.channel', 'plating.grade_color', 'plating.qty_bar', 'plating.cycle', 'plating.tgl_lot_prod_mldg', 'plating.created_by','plating.kategori')
            ->orderBy('tanggal_r', 'desc')
            ->orderBy('waktu_in_r', 'desc')
            ->where('tanggal_r', '=', $date)
            ->get();

        $masterdata = MasterData::all();

        $start_produksi = racking_t::where('tanggal_r', '=', $date)->min('waktu_in_r');
        $cycle_stop = racking_t::where('tanggal_r', '=', $date)->max('waktu_in_r');
        // dd($cycle_stop);

        return view('racking_t.racking_t', compact('racking', 'masterdata', 'date'));
    }

    //tambah data
    public function tambah(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $racking = racking_t::join('masterdata', 'masterdata.id', '=', 'plating.id_masterdata')
            ->select('plating.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->orderBy('tanggal_r', 'desc')
            ->get();

        $hit_data_racking = racking_t::where('tanggal_r', '=', $date)->count();
        $cycle = 75;
        $capacity_cooper = 34;
        $capacity_final = 38;
        $total_capacity = $capacity_cooper + $capacity_final;
        $count_rencana_produksi = Rencana_Produksi::where('tanggal', '=', $date)->count();
        $end_cycle = $count_rencana_produksi - $total_capacity;
        $fs_val = $end_cycle + $capacity_final;
        $cs_val = $fs_val + $capacity_cooper;

        $masterdata = MasterData::all();
        return view('racking_t.racking_t-tambah', compact(
            'racking',
            'masterdata',
            'hit_data_racking',
            'cycle',
            'capacity_cooper',
            'capacity_final',
            'total_capacity',
            'count_rencana_produksi',
            'end_cycle',
            'fs_val',
            'cs_val'
        ));
    }

    //simpan data
    public function simpan(Request $request)
    {
        // $validatedData = $request->validate([
        //     'tanggal_r' => 'required',
        //     'no_bar' => 'required',
        //     'part_name' => 'required',
        //     'no_part' => 'required',
        //     'katalis' => 'required',
        //     'channel' => 'required',
        //     'grade_color' => 'required',
        //     'qty_bar' => 'required',
        //     'waktu_in_r' => 'required',
        //     'tgl_lot_prod_mldg' => 'required',
        //     'cycle' => 'required',
        // ], [
        //     'tanggal_r.required' => 'Tgl Racking Harus Diisi!',
        //     'no_bar.required' => 'No Bar Harus Diisi!',
        //     'part_name.required' => 'Part Name Harus Diisi!',
        //     'no_part.required' => 'Part Number Harus Diisi!',
        //     'katalis.required' => 'katalis Harus Diisi!',
        //     'channel.required' => 'channel Harus Diisi!',
        //     'grade_color.required' => 'Grade Color Harus Diisi!',
        //     'qty_bar.required' => 'Qty Bar Harus Diisi!',
        //     'waktu_in_r.required' => 'waktu in racking Harus Diisi!',
        //     'tgl_lot_prod_mldg.required' => 'Tgl Lot Prod Molding Harus Diisi!',
        //     'cycle.required' => 'cycle Harus Diisi!',

        // ]);

        $racking = new racking_t();

        $racking->id_masterdata = $request->id_masterdata;
        $racking->tanggal_r = $request->tanggal_r;
        $racking->waktu_in_r = $request->waktu_in_r;
        $racking->no_bar = $request->no_bar;
        $racking->part_name = $request->part_name;
        $racking->no_part = $request->no_part;
        $racking->katalis = $request->katalis;
        $racking->channel = $request->channel;
        $racking->grade_color = $request->grade_color;
        $racking->qty_bar = $request->qty_bar;
        $racking->tgl_lot_prod_mldg = $request->tgl_lot_prod_mldg;
        $racking->cycle = $request->cycle;
        $racking->kategori = $request->kategori;
        $racking->created_by = Auth::user()->name;
        $racking->created_at = Carbon::now();
        $racking->status = 1;

        $racking->save();



        // $racking = racking_t::create([
        //     'id_masterdata' => $request->id_masterdata,
        //     'tanggal_r' => $request->tanggal_r,
        //     'waktu_in_r' => Carbon::now(),
        //     'no_bar' => $request->no_bar,
        //     'part_name' => $request->part_name,
        //     'no_part' => $request->no_part,
        //     'katalis' => $request->katalis,
        //     'channel' => $request->channel,
        //     'grade_color' => $request->grade_color,
        //     'qty_bar' => $request->qty_bar,
        //     'tgl_lot_prod_mldg' => $request->tgl_lot_prod_mldg,
        //     'cycle' => $request->cycle,
        //     'created_by' => Auth::user()->name,
        //     'created_at' => Carbon::now(),
        //     'status' => '1'
        // ]);
        // dd($racking->waktu_in_r);

        return redirect()->route('racking_t.tambah', compact('racking'))->with('toast_success', 'Data Berhasil Disimpan!');
    }

    //edit data
    public function edit(Request $request, $id)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $plating = racking_t::findOrFail($id);
        $previous = racking_t::where('id', '<', $plating->id)->max('id');
        $next = racking_t::where('id', '>', $plating->id)->min('id');
        $masterdata = MasterData::all();
        $hit_data_racking = racking_t::where('tanggal_r', '=', $date)->count();

        return view('racking_t.racking_t-edit', compact('plating', 'masterdata', 'hit_data_racking', 'date'))->with('previous', $previous)->with('next', $next);
    }

    //update data
    public function update(Request $request, $id)
    {
        $plating = racking_t::find($id);
        $masterdata = MasterData::all();

        $previous = racking_t::where('id', '<', $plating->id)->max('id');
        $next = racking_t::where('id', '>', $plating->id)->min('id');

        $date = Carbon::parse($request->date)->format('Y-m-d');
        $hit_data_racking = racking_t::where('tanggal_r', '=', $date)->count();
        if ($plating->qty_aktual > 1) {
            Alert::Warning('Gagal', 'Part Sudah Di Unracking!');
            return redirect()->route('racking_t.edit', compact('plating', 'hit_data_racking', 'date', 'masterdata', 'previous', 'next', 'id'));
        } else {
            $plating->id_masterdata = $request->id_masterdata;
            $plating->tanggal_r = $request->tanggal_r;
            $plating->no_bar = $request->no_bar;
            $plating->part_name = $request->part_name;
            $plating->no_part = $request->no_part;
            $plating->katalis = $request->katalis;
            $plating->channel = $request->channel;
            $plating->grade_color = $request->grade_color;
            $plating->qty_bar = $request->qty_bar;
            $plating->waktu_in_r = $request->waktu_in_r;
            $plating->tgl_lot_prod_mldg = $request->tgl_lot_prod_mldg;
            $plating->cycle = $request->cycle;
            $plating->kategori = $request->kategori;
            // $plating->updated_by = Auth::user()->id;
            // $plating->updated_at = Carbon::now();
            $plating->save();
        }
        Alert::Success('Berhasil', 'Data Berhasil Di Update!');

        return View::make('racking_t.racking_t-edit', compact('plating', 'masterdata', 'date', 'hit_data_racking'))->with('previous', $previous)->with('next', $next)->with('message', 'Data berhasil di update');
    }

    public function ajaxRacking(Request $request)
    {
        $id_masterdata['id_masterdata'] = $request->id_masterdata;
        $ajax_racking = MasterData::where('id', $id_masterdata)->get();

        return view('racking_t.racking_t-ajax', compact('ajax_racking'));
    }

    public function delete($id)
    {
        $plating = racking_t::find($id);
        $unracking = racking_t::where('id_masterdata', '=', $plating->id_masterdata)->where('id', '=', $plating->id)->first();

        if ($unracking->qty_aktual == '') {
            $masterdata = MasterData::find($plating->id_masterdata);
            $masterdata->stok_bc = $masterdata->stok_bc - $plating->qty_aktual;
            $masterdata->save();
            $plating->delete();
            // return redirect()->route('racking_t')->with('success', 'Data Berhasil Dihapus!');
            return response()->json([
                'success' => true
            ]);
        } else
            return response()->json([
                'success' => false
            ]);
        // return redirect()->route('racking_t')->with('errors', 'Data Gagal Dihapus!');
    }

    public function utama(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $start_produksi = $start_produksi = racking_t::where('tanggal_r', '=', $date)->min('waktu_in_r');
        $cycle_stop = racking_t::where('tanggal_r', '=', $date)->max('waktu_in_r');
        $jml_bar = racking_t::where('tanggal_r', '=', $date)->count();
        $ngracking_today = Ng_Racking::where('tanggal', '=', $date)->sum('quantity');
        $sum_pinbosh_tertinggal = Pinbosh_Tertinggal::where('tanggal', '=', $date)->sum('jumlah');
        $count_rencana_produksi = Rencana_Produksi::where('tanggal', '=', $date)->count();

        return view('racking_t.racking_t-menu_utama', compact('date', 'start_produksi', 'cycle_stop', 'jml_bar', 'ngracking_today', 'count_rencana_produksi', 'sum_pinbosh_tertinggal'));
    }

    // ===================================================NG RACKING =========================================================================

    public function ngracking()
    {
        $ngracking = Ng_Racking::all();
        return view('racking_t.ngracking', compact('ngracking'));
    }

    public function tambahngracking()
    {
        $ngracking = Ng_Racking::join('masterdata', 'masterdata.id', '=', 'ng_racking.id_masterdata')
            ->select('ng_racking.*', 'masterdata.part_name')
            ->get();

        $masterdata = MasterData::all();

        return view('racking_t.ngracking-tambah', compact('masterdata', 'ngracking'));
    }

    public function simpanngracking(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'id_masterdata' => 'required',
            'part_name' => 'required',
            'jenis_ng' => 'required',
            'quantity' => 'required',
        ], [
            'tanggal.required' => 'Tanggal Harus Diisi!',
            'id_masterdata.required' => 'Id Masterdata Harus Diisi!',
            'part_name.required' => 'Part Name Harus Diisi!',
            'jenis_ng.required' => 'Jenis NG Harus Diisi!',
            'quantity.required' => 'Quantity Harus Diisi!',

        ]);
        $ngracking = Ng_Racking::create([
            'tanggal' => $request->tanggal,
            'id_masterdata' => $request->id_masterdata,
            'part_name' => $request->part_name,
            'jenis_ng' => $request->jenis_ng,
            'quantity' => $request->quantity,

        ]);
        return redirect()->route('ngracking', compact('ngracking'))->with('success', 'Data Berhasil Disimpan!');
    }

    public function editngracking($id)
    {
        $ngracking = Ng_Racking::findOrFail($id);
        $masterdata = MasterData::all();
        return view('racking_t.ngracking-edit', compact('masterdata', 'ngracking'));
    }

    public function updatengracking(Request $request)
    {
        Ng_Racking::where('id', $request->id)->update([
            'tanggal' => $request->tanggal,
            'id_masterdata' => $request->id_masterdata,
            'part_name' => $request->part_name,
            'jenis_ng' => $request->jenis_ng,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('ngracking')->with('message', 'Data berhasil di update');
    }

    public function deletengracking($id)
    {
        Ng_Racking::findOrFail($id);
        Ng_Racking::destroy($id);
        return redirect()->route('ngracking')->with('success', 'Data Berhasil Dihapus');
    }


    // ===================================================PINBOSH TERTINGGAL =========================================================================

    public function pinbosh()
    {
        $pinbosh = Pinbosh_Tertinggal::all();

        return view('racking_t.pinbosh', compact('pinbosh'));
    }
    public function pinboshTambah()
    {
        $masterdata = MasterData::all();
        return view('racking_t.pinbosh-tambah', compact('masterdata'));
    }

    public function pinboshSimpan(Request $request)
    {
        $pinbosh = Pinbosh_Tertinggal::create([
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'id_masterdata' => $request->id_masterdata,
            'part_name' => $request->part_name,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('pinbosh', compact('pinbosh'))->with('success', 'Data Berhasil Disimpan!');
    }

    public function pinboshEdit($id)
    {
        $pinbosh = Pinbosh_Tertinggal::findOrFail($id);
        $masterdata = MasterData::all();
        return view('pinbosh.edit', compact('masterdata', 'pinbosh'));
    }
}
