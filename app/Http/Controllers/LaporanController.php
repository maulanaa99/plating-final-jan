<?php

namespace App\Http\Controllers;

use App\Models\kensa;
use App\Models\KensaTrial;
use App\Models\Plating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $start_date = Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d h:i:s');
        $end_date = Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d h:i:s');

        if ($request->start_date || $request->end_date) {
            $start_date = Carbon::parse($request->start_date)->startOfDay()->format('Y-m-d h:i:s');
            $end_date = Carbon::parse($request->end_date)->endOfDay()->format('Y-m-d h:i:s');
            $kensa = kensa::join('masterdata', 'masterdata.id', '=', 'kensa.id_masterdata')
                ->join('plating', 'plating.id', '=', 'kensa.id_plating')
                ->select('kensa.*', 'masterdata.stok_bc', 'plating.part_name', 'plating.no_bar', 'plating.qty_bar', 'plating.cycle', 'plating.qty_aktual', 'plating.tanggal_u', 'plating.waktu_in_u')
                ->orderBy('tanggal_k', 'asc')->orderBy('waktu_k', 'asc')
                ->whereBetween('date_time', [$start_date, $end_date])
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

        $sum_qty_bar = kensa::whereBetween('date_time', [$start_date, $end_date])->get()->sum('qty_bar');
        $sum_total_ok = kensa::whereBetween('date_time', [$start_date, $end_date])->get()->sum('total_ok');
        $sum_total_ng = kensa::whereBetween('date_time', [$start_date, $end_date])->get()->sum('total_ng');
        $total_ok = $sum_total_ok != 0 && $sum_qty_bar != 0 ? (($sum_total_ok / $sum_qty_bar) * 100) : 0;
        $total_ng = $sum_total_ng != 0 && $sum_qty_bar != 0 ? (($sum_total_ng / $sum_qty_bar) * 100) : 0;

        $kensa_today = kensa::whereBetween('date_time', [$start_date, $end_date])->count();
        $kensa_total = kensa::whereBetween('date_time', [$start_date, $end_date])->sum('qty_bar');

        $sum_qty_bar = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('qty_bar');
        $sum_nikel = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('nikel');
        $sum_butsu = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('butsu');
        $sum_hadare = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('hadare');
        $sum_hage = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('hage');
        $sum_moyo = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('moyo');
        $sum_fukure = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('fukure');
        $sum_crack = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('crack');
        $sum_henkei = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('henkei');
        $sum_hanazaki = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('hanazaki');
        $sum_kizu = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('kizu');
        $sum_kaburi = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('kaburi');
        $sum_shiromoya = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('shiromoya');
        $sum_shimi = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('shimi');
        $sum_pitto = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('pitto');
        $sum_misto = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('misto');
        $sum_other = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('other');
        $sum_gores = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('gores');
        $sum_regas = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('regas');
        $sum_silver = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('silver');
        $sum_hike = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('hike');
        $sum_burry = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('burry');
        $sum_others = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('others');
        $sum_total_ok = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('total_ok');
        $sum_total_ng = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->sum('total_ng');
        $avg_p_total_ok = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->average('p_total_ok');
        $avg_p_total_ng = DB::table('kensa')->whereBetween('date_time', [$start_date, $end_date])->average('p_total_ng');

        return view('laporan.laporan-kensa', compact(
            'kensa',
            'start_date',
            'end_date',
            'total_ok',
            'total_ng',
            'kensa_today',
            'kensa_total',
            'sum_nikel',
            'sum_butsu',
            'sum_hadare',
            'sum_hage',
            'sum_moyo',
            'sum_fukure',
            'sum_crack',
            'sum_henkei',
            'sum_hanazaki',
            'sum_kizu',
            'sum_kaburi',
            'sum_shiromoya',
            'sum_shimi',
            'sum_pitto',
            'sum_misto',
            'sum_other',
            'sum_gores',
            'sum_regas',
            'sum_silver',
            'sum_hike',
            'sum_burry',
            'sum_others',
            'sum_total_ok',
            'sum_total_ng',
        ));
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
                ->orderBy('tanggal_k', 'asc')
                ->orderBy('waktu_k', 'asc')
                ->get();
            // dd([$start_date, $end_date]);
        } else {
            $alls = kensa::join('masterdata', 'masterdata.id', '=', 'kensa.id_masterdata')
                ->join('plating', 'plating.id', '=', 'kensa.id_plating')
                ->select('plating.*', 'kensa.*')
                ->whereBetween('tanggal_k', [$start_date, $end_date]);
        }
        return view('laporan.laporan-all', compact('alls', 'start_date', 'end_date'));
    }

    public function trial(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        if ($request->start_date || $request->end_date) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $trials = KensaTrial::join('masterdata', 'masterdata.id', '=', 'kensa_tr.id_masterdata')
                ->join('plating_tr', 'plating_tr.id', '=', 'kensa_tr.id_plating')
                ->select('plating_tr.*', 'kensa_tr.*')
                ->whereBetween('tanggal_k', [$start_date, $end_date])
                ->orderBy('tanggal_k', 'asc')
                ->orderBy('waktu_k', 'asc')
                ->get();
            // dd([$start_date, $end_date]);
        } else {
            $trials = KensaTrial::join('masterdata', 'masterdata.id', '=', 'kensa_tr.id_masterdata')
                ->join('plating_tr', 'plating_tr.id', '=', 'kensa_tr.id_plating')
                ->select('plating_tr.*', 'kensa_tr.*')
                ->whereBetween('tanggal_k', [$start_date, $end_date]);
        }
        return view('laporan.laporan-trial', compact('trials', 'start_date', 'end_date'));
    }
}
