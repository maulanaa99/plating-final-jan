<?php

namespace App\Http\Controllers;

use App\Exports\UnrackingExport;
use App\Models\racking_t;
use App\Models\unracking_t;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UnrackingController_T extends Controller
{
    //tampil data
    public function index()
    {
        $plating = DB::table('plating')
            ->join('masterdata', 'masterdata.no_part', '=', 'plating.no_part')
            ->orderBy('tanggal_r', 'desc')->orderBy('waktu_in_r', 'desc')
            ->paginate(75);
        return view('unracking_t.unracking_t', ['plating' => $plating]);
    }

    //tambah data
    public function tambah()
    {
        return view('unracking_t.unracking_t-tambah');
    }

    //simpan data
    public function simpan(Request $request)
    {
        DB::table('plating')->insert([
            'tanggal_u' => $request->tanggal_u,
            'waktu_in_u' => $request->waktu_in_u,
            'qty_aktual' => $request->qty_aktual
        ]);
        return redirect()->route('unracking_t')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    //edit data
    public function edit($id)
    {

        // return view('racking.racking-edit',compact('racking'));
        $plating = DB::table('plating')->where('plating_id', $id)->first();
        return view('unracking_t.unracking_t-edit', ['plating' => $plating]);
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
        $validatedData = $request->validate([
            'qty_aktual' => 'required'
          ], [
            'qty_aktual.required' => 'Qty Aktual Harus Diisi!',
        ]);

        DB::table('plating')->where('plating_id', $request->id)->update([
            'tanggal_u' => $request->tanggal_u,
            'waktu_in_u' => $request->waktu_in_u,
            'qty_aktual' => $request->qty_aktual,
            'updated_by' => Auth::user()->name,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('unracking_t')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    public function autocomplete($id)
    {
        if (empty($id)) {
            return [];
        }
        $datas = DB::table('masterdata')
            ->join('plating', 'plating.no_part', '=', 'masterdata.no_part')
            ->where('masterdata.part_name', 'LIKE', "$id%")
            ->limit(25)
            ->get();

        return $datas;
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $plating = racking_t::where('part_name', 'like', "%" . $keyword . "%")->paginate(124);
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

    public function exportexcel(){
        return Excel::download(new UnrackingExport, 'Unracking.xlsx');
    }

    public function unrackingPrint(Request $request, $id)
    {
        $unracking = unracking_t::where('plating_id',$id)->first();
        return view('unracking_t.unracking_t-print',compact('unracking'));
    }
}
