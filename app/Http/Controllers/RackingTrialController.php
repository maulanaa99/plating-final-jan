<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\RackingTrial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class RackingTrialController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');

        $racking_trial = RackingTrial::join('masterdata', 'masterdata.id', '=', 'plating_tr.id_masterdata')
            ->select('plating_tr.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->where('tanggal_r', '=', $date)
            ->get();

        $masterdata = MasterData::all();
        return view('racking_trial.racking_trial', compact('racking_trial', 'date', 'masterdata'));
    }
    public function tambah(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');

        $racking_trial = RackingTrial::join('masterdata', 'masterdata.id', '=', 'plating_tr.id_masterdata')
            ->select('plating_tr.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->orderBy('tanggal_r', 'desc')
            ->get();

        $hit_data_racking_trial = RackingTrial::where('tanggal_r', '=', $date)->count();

        $masterdata = MasterData::all();
        return view('racking_trial.racking_trial-tambah', compact(
            'racking_trial',
            'masterdata',
            'hit_data_racking_trial'
        ));
    }
    public function simpan(Request $request)
    {
        $racking_trial = new RackingTrial();

        $racking_trial->id_masterdata = $request->id_masterdata;
        $racking_trial->tanggal_r = $request->tanggal_r;
        $racking_trial->waktu_in_r = $request->waktu_in_r;
        $racking_trial->no_bar = $request->no_bar;
        $racking_trial->part_name = $request->part_name;
        $racking_trial->no_part = $request->no_part;
        $racking_trial->katalis = $request->katalis;
        $racking_trial->channel = $request->channel;
        $racking_trial->grade_color = $request->grade_color;
        $racking_trial->qty_bar = $request->qty_bar;
        $racking_trial->cycle = $request->cycle;
        $racking_trial->keterangan = $request->keterangan;
        $racking_trial->created_by = Auth::user()->name;
        $racking_trial->created_at = Carbon::now();
        $racking_trial->status = '4';

        $racking_trial->save();

        return redirect()->route('tr.racking.tambah', compact('racking_trial'))->with('toast_success', 'Data Berhasil Disimpan!');
    }

    public function edit(Request $request, $id)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $racking_trial = RackingTrial::findOrFail($id);
        $previous = RackingTrial::where('id', '<', $racking_trial->id)->max('id');
        $next = RackingTrial::where('id', '>', $racking_trial->id)->min('id');
        $masterdata = MasterData::all();
        return view('racking_trial.racking_trial-edit', compact('racking_trial', 'masterdata', 'date'))->with('previous', $previous)->with('next', $next);
    }

    public function update(Request $request, $id)
    {
        $racking_trial = RackingTrial::findOrFail($id);
        $masterdata = MasterData::all();

        $previous = RackingTrial::where('id', '<', $racking_trial->id)->max('id');
        $next = RackingTrial::where('id', '>', $racking_trial->id)->min('id');

        $date = Carbon::parse($request->date)->format('Y-m-d');

        $racking_trial->id_masterdata = $request->id_masterdata;
        $racking_trial->tanggal_r = $request->tanggal_r;
        $racking_trial->no_bar = $request->no_bar;
        $racking_trial->part_name = $request->part_name;
        $racking_trial->no_part = $request->no_part;
        $racking_trial->katalis = $request->katalis;
        $racking_trial->channel = $request->channel;
        $racking_trial->grade_color = $request->grade_color;
        $racking_trial->qty_bar = $request->qty_bar;
        $racking_trial->waktu_in_r = $request->waktu_in_r;
        $racking_trial->cycle = $request->cycle;
        $racking_trial->keterangan = $request->keterangan;
        $racking_trial->updated_by = Auth::user()->id;
        $racking_trial->updated_at = Carbon::now();
        $racking_trial->save();

        Alert::Success('Berhasil', 'Data Berhasil Di Update!');
        return View::make('racking_trial.racking_trial-edit', compact('racking_trial', 'masterdata', 'date'))->with('previous', $previous)->with('next', $next)->with('message', 'Data berhasil di update');
    }

    public function delete($id)
    {
        $racking_trial = RackingTrial::findOrFail($id);
        $racking_trial->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
