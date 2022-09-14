<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\Racking;
use App\Models\racking_t;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RackingController_T extends Controller
{
    //tampil data
    public function index()
    {
        // $plating = DB::table('plating')
        //     ->join('masterdata', 'masterdata.no_part', '=', 'plating.no_part')
        //     ->orderBy('tanggal_r', 'desc')->orderBy('waktu_in_r', 'desc')
        //     ->paginate(75);
        // return view('racking_t.racking_t', ['plating' => $plating]);

        $plating = racking_t::join('masterdata', 'masterdata.no_part', '=', 'plating.no_part')
            ->select('plating.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->orderBy('tanggal_r', 'desc')->orderBy('waktu_in_r', 'desc')
            ->paginate(75);

        $masterdata = MasterData::all();

        return view('racking_t.racking_t', compact('plating', 'masterdata'));
    }

    //tambah data
    public function tambah()
    {
        return view('racking_t.racking_t-tambah');
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

        DB::table('plating')->insert([
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
            'cycle' => $request->cycle
        ]);
        return redirect()->route('racking_t.tambah')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    //edit data
    public function edit($id)
    {

        // return view('racking.racking-edit',compact('racking'));
        $plating = DB::table('plating')->where('plating_id', $id)->first();
        return view('racking_t.racking_t-edit', ['plating' => $plating]);
    }

    //hapus data
    public function delete($id)
    {
        DB::table('plating')
            ->select('plating.plating_id')->where('plating_id', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    //update data
    public function update(Request $request)
    {
        DB::table('plating')->where('plating_id', $request->id)->update([
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
            'cycle' => $request->cycle
        ]);
        return redirect()->route('racking_t')->with('message', 'Data berhasil di update');
    }

    public function autocomplete($id)
    {
        if (empty($id)) {
            return [];
        }
        $datas = DB::table('masterdata')
            ->join('plating', 'plating.no_part', '=', 'masterdata.no_part')
            ->where('masterdata.part_name', 'LIKE', "%" . $id . "%")
            ->limit(25)
            ->get();

        return $datas;
    }

    //cari data
    public function search(Request $request)
    {
        $keyword = $request->search;
        $plating = racking_t::where('part_name', 'like', "%" . $keyword . "%")->paginate(124);
        return view('racking_t.racking_t', compact('plating'))->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function searchDate(Request $request)
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $plating = racking_t::whereBetween('tanggal_r', [$start_date, $end_date])->paginate(75);
        } else {
            $plating = racking_t::latest()->paginate(75);
        }
        return view('racking_t.racking_t', compact('plating'));
    }
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_r'])
            ->format('d-m-Y');
    }
}
