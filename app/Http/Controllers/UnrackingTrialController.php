<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\UnrackingTrial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class UnrackingTrialController extends Controller
{
    public function index(Request $request)

    {
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        $unracking_trial = UnrackingTrial::where('tanggal_r', '=', $start_date)
            ->orderBy('tanggal_r', 'desc')
            ->orderBy('waktu_in_r', 'desc')
            ->get();
        return view('unracking_trial.unracking_trial', compact('unracking_trial', 'start_date', 'end_date'));
    }
    public function edit(Request $request, $id)
    {
        $unracking_trial = UnrackingTrial::find($id);
        $masterdata = MasterData::find($unracking_trial->id_masterdata);

        $previous = UnrackingTrial::where('id', '<', $unracking_trial->id)->max('id');
        $next = UnrackingTrial::where('id', '>', $unracking_trial->id)->min('id');

        return view('unracking_trial.unracking_trial-edit', compact('previous', 'next', 'unracking_trial', 'masterdata', 'id'));
    }

    public function update(Request $request, $id)
    {
        $unracking_trial = UnrackingTrial::find($id);
        $masterdata = MasterData::find($unracking_trial->id_masterdata);

        if ($request->qty_aktual > $unracking_trial->qty_bar) {
            Alert::Warning('Gagal', 'Qty Aktual Salah!!');
            return redirect()->route('tr.unracking.edit', compact('unracking_trial', 'masterdata', 'id'));
        } else {
            $unracking_trial->tanggal_u = $request->tanggal_u;
            $unracking_trial->waktu_in_u = Carbon::now()->format('H:i:m');
            $unracking_trial->qty_aktual = $request->qty_aktual;
            $unracking_trial->cycle = $request->cycle;
            $unracking_trial->updated_by = Auth::user()->name;
            $unracking_trial->status = '5';
            $unracking_trial->save();
            $masterdata->save();
        }

        $previous = UnrackingTrial::where('id', '<', $unracking_trial->id)->max('id');
        $next = UnrackingTrial::where('id', '>', $unracking_trial->id)->min('id');

        Alert::success('Success', 'Data Berhasil Disimpan!');
        return View::make('unracking_trial.unracking_trial-edit', compact('unracking_trial', 'masterdata'))->with('previous', $previous)->with('next', $next);
    }
}
