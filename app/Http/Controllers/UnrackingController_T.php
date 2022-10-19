<?php

namespace App\Http\Controllers;

use App\Exports\UnrackingExport;
use App\Models\MasterData;
use App\Models\unracking_t;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UnrackingController_T extends Controller
{
    //tampil data
    public function index()
    {
        $plating = unracking_t::join('masterdata', 'masterdata.id', '=', 'plating.id_masterdata')
            ->select('plating.*', 'masterdata.stok_bc')
            ->orderBy('tanggal_r', 'desc')->orderBy('waktu_in_r', 'desc')
            ->get();
        $masterdata = MasterData::all();
        return view('unracking_t.unracking_t', compact('plating', 'masterdata'));
    }

    //edit data
    public function edit($id)
    {
        $plating = unracking_t::find($id);
        return view('unracking_t.unracking_t-edit', compact('plating'));
    }

    //update data
    public function update(Request $request, $id)
    {
        $unracking = unracking_t::find($id);
        $unracking->tanggal_u = $request->tanggal_u;
        $unracking->waktu_in_u = $request->waktu_in_u;
        $unracking->qty_aktual = $request->qty_aktual;
        $unracking->save();
        return redirect()->route('unracking_t')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function search(Request $request)
    {
        $keyword = $request->search;
        $plating = unracking_t::where('part_name', 'like', "%" . $keyword . "%")->paginate(124);
        return view('unracking_t.unracking_t', compact('plating'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function searchDater(Request $request)
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $plating = unracking_t::whereBetween('tanggal_u', [$start_date, $end_date])->paginate(75);
        } else {
            $plating = unracking_t::latest()->paginate(75);
        }
        return view('unracking_t.unracking_t', compact('plating'));
    }

    public function exportexcel()
    {
        return Excel::download(new UnrackingExport, 'Unracking.xlsx');
    }

    public function unrackingPrint(Request $request, $id)
    {
        $unracking = unracking_t::where('id', $id)->first();
        return view('unracking_t.unracking_t-print', compact('unracking'));
    }
}
