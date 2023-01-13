<?php

namespace App\Http\Controllers;

use App\Models\KensaTrial;
use App\Models\MasterData;
use App\Models\UnrackingTrial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KensaTrialController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $kensa_trial = KensaTrial::join('masterdata', 'masterdata.id', '=', 'kensa_tr.id_masterdata')
            ->join('plating_tr', 'plating_tr.id', '=', 'kensa_tr.id_plating')
            ->select('kensa_tr.*', 'masterdata.stok_bc', 'plating_tr.part_name', 'plating_tr.no_bar', 'plating_tr.qty_bar', 'plating_tr.cycle', 'plating_tr.qty_aktual')
            // ->orderBy('tanggal_k', 'desc')->orderBy('waktu_k', 'desc')
            ->where('tanggal_k', '=', $date)
            ->get();
        $masterdata = MasterData::all();

        $sum_qty_bar = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('qty_bar');
        $sum_nikel = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('nikel');
        $sum_butsu = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('butsu');
        $sum_hadare = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('hadare');
        $sum_hage = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('hage');
        $sum_moyo = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('moyo');
        $sum_fukure = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('fukure');
        $sum_crack = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('crack');
        $sum_henkei = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('henkei');
        $sum_hanazaki = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('hanazaki');
        $sum_kizu = DB::table('kensa_tr')->get()->where('tanggal_k', '=', $date)->sum('kizu');
        $sum_kaburi = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('kaburi');
        $sum_shiromoya = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('shiromoya');
        $sum_shimi = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('shimi');
        $sum_pitto = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('pitto');
        $sum_misto = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('misto');
        $sum_other = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('other');
        $sum_gores = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('gores');
        $sum_regas = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('regas');
        $sum_silver = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('silver');
        $sum_hike = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('hike');
        $sum_burry = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('burry');
        $sum_others = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('others');
        $sum_total_ok = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('total_ok');
        $sum_total_ng = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->sum('total_ng');
        $avg_p_total_ok = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->average('p_total_ok');
        $avg_p_total_ng = DB::table('kensa_tr')->where('tanggal_k', '=', $date)->get()->average('p_total_ng');

        return view('kensa_trial.kensa_trial', compact(
            'date',
            'kensa_trial',
            'sum_qty_bar',
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
            'avg_p_total_ok',
            'avg_p_total_ng',
        ));
    }

    public function tambah(Request $request)
    {
        $kensa_trial = KensaTrial::join('masterdata', 'masterdata.id', '=', 'kensa_tr.id_masterdata')
            ->join('plating_tr', 'plating_tr.id', '=', 'kensa_tr.id_plating')
            ->select('kensa_tr.*', 'masterdata.stok_bc', 'plating_tr.id', 'plating_tr.part_name', 'plating_tr.no_bar', 'plating_tr.qty_bar', 'plating_tr.cycle', 'plating_tr.qty_aktual')
            ->orderBy('tanggal_k', 'desc')
            ->get();


        $unracking_trial = UnrackingTrial::join('masterdata', 'masterdata.id', '=', 'plating_tr.id_masterdata')
            ->select('plating_tr.*', 'masterdata.part_name', 'masterdata.stok_bc')
            ->where('status', '=', '5')
            ->get();

        $date = Carbon::parse($request->date)->format('Y-m-d');
        $hit_data_kensa_trial = KensaTrial::where('tanggal_k', '=', $date)->count();

        $masterdata = MasterData::all();

        return view('kensa_trial.kensa_trial-tambah', compact('kensa_trial', 'masterdata', 'unracking_trial', 'date', 'hit_data_kensa_trial'));
    }

    public function simpan(Request $request)
    {
        KensaTrial::create([
            'tanggal_k' => $request->tanggal_k,
            'waktu_k' => $request->waktu_k,
            'id_masterdata' => $request->id_masterdata,
            'id_plating' => $request->id_plating,
            'no_part' => $request->no_part,
            'part_name' => $request->part_name,
            'no_bar' => $request->no_bar,
            'qty_bar' => $request->qty_bar,
            'cycle' => $request->cycle,
            'nikel' => $request->nikel,
            'butsu' => $request->butsu,
            'hadare' => $request->hadare,
            'hage' => $request->hage,
            'moyo' => $request->moyo,
            'fukure' => $request->fukure,
            'crack' => $request->crack,
            'henkei' => $request->henkei,
            'hanazaki' => $request->hanazaki,
            'kizu' => $request->kizu,
            'kaburi' => $request->kaburi,
            'shiromoya' => $request->shiromoya,
            'shimi' => $request->shimi,
            'pitto' => $request->pitto,
            'misto' => $request->misto,
            'other' => $request->other,
            'gores' => $request->gores,
            'regas' => $request->regas,
            'silver' => $request->silver,
            'hike' => $request->hike,
            'burry' => $request->burry,
            'others' => $request->others,
            'total_ok' => $request->total_ok,
            'total_ng' => $request->total_ng,
            'p_total_ok' => $request->p_total_ok,
            'p_total_ng' => $request->p_total_ng,
            'keterangan' => $request->keterangan,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now(),
        ]);

        $unracking_trial = UnrackingTrial::find($request->id_plating);
        $unracking_trial->status = '6';
        $unracking_trial->save();

        return redirect()->route('tr.kensa.tambah')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Request $request, $id)
    {
        // $kensa = kensa::where('id', '=', $id)->first();

        $date = Carbon::parse($request->date)->format('Y-m-d');
        $kensa_trial = KensaTrial::find($id);
        $masterdata = MasterData::all();

        return view('kensa_trial.kensa_trial-edit', compact('kensa_trial', 'masterdata', 'date'));
    }

    public function update(Request $request, $id)
    {
        $kensa_trial = KensaTrial::find($id);

        $kensa_trial->id_masterdata;
        $kensa_trial->id_plating;
        $kensa_trial->tanggal_k = $request->tanggal_k;
        $kensa_trial->waktu_k = $request->waktu_k;
        $kensa_trial->no_part = $request->no_part;
        $kensa_trial->part_name = $request->part_name;
        $kensa_trial->no_bar = $request->no_bar;
        $kensa_trial->qty_bar = $request->qty_bar;
        $kensa_trial->cycle = $request->cycle;
        $kensa_trial->nikel = $request->nikel;
        $kensa_trial->butsu = $request->butsu;
        $kensa_trial->hadare = $request->hadare;
        $kensa_trial->hage = $request->hage;
        $kensa_trial->moyo = $request->moyo;
        $kensa_trial->fukure = $request->fukure;
        $kensa_trial->crack = $request->crack;
        $kensa_trial->henkei = $request->henkei;
        $kensa_trial->hanazaki = $request->hanazaki;
        $kensa_trial->kizu = $request->kizu;
        $kensa_trial->kaburi = $request->kaburi;
        $kensa_trial->shiromoya = $request->shiromoya;
        $kensa_trial->shimi = $request->shimi;
        $kensa_trial->pitto = $request->pitto;
        $kensa_trial->misto = $request->misto;
        $kensa_trial->other = $request->other;
        $kensa_trial->gores = $request->gores;
        $kensa_trial->regas = $request->regas;
        $kensa_trial->silver = $request->silver;
        $kensa_trial->hike = $request->hike;
        $kensa_trial->burry = $request->burry;
        $kensa_trial->others = $request->others;
        $kensa_trial->total_ok = $request->total_ok;
        $kensa_trial->total_ng = $request->total_ng;
        $kensa_trial->p_total_ok = $request->p_total_ok;
        $kensa_trial->p_total_ng = $request->p_total_ng;
        $kensa_trial->save();

        Alert::Success('Success!', 'Data Berhasil Di Edit!');
        return redirect()->route('tr.kensa');
    }

    public function delete($id)
    {
        $kensa_trial = KensaTrial::find($id);

        // $masterdata = kensa::where('id_masterdata', '=', $kensa->id_masterdata)->first();
        $masterdata = MasterData::find($kensa_trial->id_masterdata);
        $unracking_trial = UnrackingTrial::find($kensa_trial->id_plating);
        $unracking_trial->status = '5';
        $unracking_trial->save();
        $masterdata->save();
        $kensa_trial->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
