<?php

namespace App\Http\Controllers;

use App\Models\kensa;
use App\Models\Plating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        if ($request->start_date || $request->end_date) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $plating = Plating::whereBetween('tanggal_r', [$start_date, $end_date])
                ->orderBy('tanggal_r', 'desc')
                ->orderBy('waktu_in_r', 'desc')
                ->get();
        } else {
            $plating = Plating::select(
                'id_masterdata',
                'no_part',
                'part_name',
                'katalis',
                'channel',
                'grade_color',
                'qty_bar',
                'cycle',
                'tanggal_r',
                'no_bar',
                'waktu_in_r',
                'tgl_lot_prod_mldg',
                'tanggal_u',
                'waktu_in_u',
                'qty_aktual'
            )->whereBetween('tanggal_r', [$start_date, $end_date]);
        }
        return view('laporan.laporan-plating', compact('plating', 'start_date', 'end_date'));
    }
    public function getData()
    {
        $plating = Plating::latest()->get();
        return DataTables::of($plating)
            ->addIndexColumn()
            ->make(true);
    }

    public function kensa(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d h:i');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d h:i');
        if ($request->start_date || $request->end_date) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d h:i');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d h:i');
            $kensa = kensa::whereBetween('created_at', [$start_date, $end_date])
                ->get();
        } else {
            $kensa = kensa::select(
                'id_masterdata',
                'tanggal_k',
                'waktu_k',
                'no_part',
                'part_name',
                'no_bar',
                'qty_bar',
                'cycle',
                'nikel',
                'butsu',
                'hadare',
                'hage',
                'moyo',
                'fukure',
                'crack',
                'henkei',
                'hanazaki',
                'kizu',
                'kaburi',
                'shiromoya',
                'shimi',
                'pitto',
                'other',
                'gores',
                'regas',
                'silver',
                'hike',
                'burry',
                'others',
                'total_ok',
                'total_ng',
                'p_total_ok',
                'p_total_ng'
            )->whereBetween('tanggal_k', [$start_date, $end_date]);
        }
        return view('laporan.laporan-kensa', compact('kensa', 'start_date', 'end_date'));
    }
    public function all(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        if ($request->start_date || $request->end_date) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $alls = kensa::join('masterdata', 'masterdata.id', '=', 'kensa.id_masterdata')
                ->join('plating', 'plating.id', '=', 'kensa.id_plating')
                ->select('plating.*', 'kensa.*')
                ->whereBetween('tanggal_k', [$start_date, $end_date])
                ->orderBy('tanggal_k', 'desc')
                ->get();
        } else {
            $alls = kensa::join('masterdata', 'masterdata.id', '=', 'kensa.id_masterdata')
                ->join('plating', 'plating.id', '=', 'kensa.id_plating')
                ->select('plating.*', 'kensa.*')
                ->whereBetween('tanggal_k', [$start_date, $end_date]);
        }
        return view('laporan.laporan-all', compact('alls', 'start_date', 'end_date'));
    }
}
