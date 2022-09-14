<?php

namespace App\Http\Controllers;

use App\Models\kensa;
use App\Models\MasterData;
use App\Models\Pengiriman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KensaController extends Controller
{
    //tampil data
    public function index()
    {
        $kensa = kensa::join('masterdata', 'masterdata.id', '=', 'kensa.id_masterdata')
            ->select('kensa.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->orderBy('tanggal_k', 'desc')
            ->get();

        $masterdata = MasterData::all();
        return view('kensa.kensa-index', compact('kensa', 'masterdata'));
    }

    //tambah data
    public function tambah()
    {
        $kensa = kensa::join('masterdata', 'masterdata.id', '=', 'kensa.id_masterdata')
            ->select('kensa.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->orderBy('tanggal_k', 'desc')
            ->get();

        $masterdata = MasterData::all();
        return view('kensa.kensa-tambah', compact('kensa', 'masterdata'));
    }

    //simpan data
    public function simpan(Request $request)
    {
        kensa::create([
            'tanggal_k' => $request->tanggal_k,
            'id_masterdata' => $request->id_masterdata,
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
            'p_total_ng' => $request->p_total_ng
        ]);
        $masterdata = MasterData::find($request->id_masterdata);
        $masterdata->stok += $request->total_ok;
        $masterdata->save();

        return redirect()->route('kensa')->with('toast_success', 'Data berhasil disimpan');
    }

    //edit data
    public function edit($id)
    {
        // return view('racking.racking-edit',compact('racking'));
        $kensa = DB::table('kensa')->where('kensa_id', $id)->first();
        return view('kensa.kensa-edit', ['kensa' => $kensa]);
    }

    //hapus data
    public function delete($id)
    {
        $kensa = kensa::find($id);
        $kensa->delete();
        return redirect('kensa')->with('toast_success', 'Data berhasil dihapus');
        // DB::table('kensa')
        //     ->select('kensa.kensa_id')->where('kensa_id', $id)->delete();
        // return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    //update data
    public function update(Request $request, $id)
    {
        $kensa = kensa::find($id);

        $kensa->tanggal_k = $request->tanggal_k;
        $kensa->no_part = $request->no_part;
        $kensa->part_name = $request->part_name;
        $kensa->no_bar = $request->no_bar;
        $kensa->qty_bar = $request->qty_bar;
        $kensa->cycle = $request->cycle;
        $kensa->nikel = $request->nikel;
        $kensa->butsu = $request->butsu;
        $kensa->hadare = $request->hadare;
        $kensa->hage = $request->hage;
        $kensa->moyo = $request->moyo;
        $kensa->fukure = $request->fukure;
        $kensa->crack = $request->crack;
        $kensa->henkei = $request->henkei;
        $kensa->hanazaki = $request->hanazaki;
        $kensa->kizu = $request->kizu;
        $kensa->kaburi = $request->kaburi;
        $kensa->other = $request->other;
        $kensa->gores = $request->gores;
        $kensa->regas = $request->regas;
        $kensa->silver = $request->silver;
        $kensa->hike = $request->hike;
        $kensa->burry = $request->burry;
        $kensa->others = $request->others;
        $kensa->total_ok = $request->total_ok;
        $kensa->total_ng = $request->total_ng;
        $kensa->p_total_ok = $request->p_total_ok;
        $kensa->p_total_ng = $request->p_total_ng;

        $kensa->save();
        alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
        return redirect()->route('kensa')->with('message', 'Data berhasil di update');
    }

    public function autocomplete($id)
    {
        if (empty($id)) {
            return [];
        }
        $datas = DB::table('masterdata')
            ->join('kensa', 'kensa.no_part', '=', 'masterdata.no_part')
            ->where('masterdata.part_name', 'LIKE', "$id%")
            ->limit(25)
            ->get();

        return $datas;
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $kensa = kensa::where('part_name', 'like', "%" . $keyword . "%")->paginate(124);
        return view('kensa.kensa-index', compact('kensa'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function searchDater(Request $request)
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $kensa = kensa::whereBetween('tanggal_k', [$start_date, $end_date])->paginate(75);
        } else {
            $kensa = kensa::latest()->paginate(75);
        }
        return view('kensa.kensa-index', compact('kensa'));
    }

    public function printKanban()
    {
        $pengiriman = Pengiriman::join('masterdata', 'masterdata.id', '=', 'pengiriman.id_masterdata')
            ->select('pengiriman.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->get();

        $masterdata = MasterData::all();
        return view('kensa.print-kanban', compact('pengiriman','masterdata'));
    }

    public function ajax(Request $request)
    {
        $id_masterdata['id_masterdata'] = $request->id_masterdata;
        $ajax_barang = MasterData::where('id', $id_masterdata)->get();

        return view('kensa.kensa-ajax', compact('ajax_barang'));
    }

    public function ajaxKanban(Request $request)
    {
        $id_masterdata['id_masterdata'] = $request->id_masterdata;
        $ajax_barang = MasterData::where('id', $id_masterdata)->get();

        return view('kensa.print-kanban-ajax', compact('ajax_barang'));
    }

    public function kanbansimpan(Request $request)
    {
        Pengiriman::create([
            'tgl_kanban' => $request->tgl_kanban,
            'id_masterdata' => $request->id_masterdata,
            'no_part' => $request->no_part,
            'part_name' => $request->part_name,
            'qty_troly' => $request->qty_troly,
            'no_kartu' => $request->no_kartu,
            'next_process' => $request->next_process,
            'kirim_painting' => $request->kirim_painting,
            'kirim_assy' => $request->kirim_assy,
        ]);
        $masterdata = MasterData::find($request->id_masterdata);
        $masterdata->stok -= $request->kirim_assy;
        $masterdata->kirim_assy += $request->kirim_assy;
        $masterdata->no_kartu = $request->no_kartu;
        $masterdata->save();

        return redirect()->route('kensa.printKanban')->with('toast_success', 'Data berhasil disimpan');
    }

}
