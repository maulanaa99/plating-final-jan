<?php

namespace App\Http\Controllers;

use App\Models\kensa;
use App\Models\MasterData;
use App\Models\Pengiriman;
use App\Models\Plating;
use App\Models\Rencana_Produksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d') ?? date('Y-m-d');
        // $stok = Pengiriman::rightJoin('masterdata', function ($rightJoin) use ($date) {
        //     $rightJoin->on('masterdata.id', '=', 'pengiriman.id_masterdata')->where('tgl_kanban', '=', $date);
        // })
        //     ->select('pengiriman.kirim_assy', 'pengiriman.kirim_painting', 'pengiriman.kirim_ppic', 'masterdata.part_name', 'masterdata.no_part', 'masterdata.total_ok', 'masterdata.total_ng', 'masterdata.stok', 'masterdata.stok_bc', DB::raw('MAX(pengiriman.no_kartu) as no_kartu'))
        //     ->groupBy('masterdata.id')
        //     ->get();

        $sum_total_ok = kensa::where('tanggal_k', '=', $date)->sum('total_ok');
        $sum_total_ng = kensa::where('tanggal_k', '=', $date)->sum('total_ng');
        $sum_stok_bc =  MasterData::sum('stok_bc');
        $sum_stok = MasterData::sum('stok');
        $sum_kirim_painting = Pengiriman::where('tgl_kanban', '=', $date)->sum('kirim_painting');
        $sum_kirim_assy = Pengiriman::where('tgl_kanban', '=', $date)->sum('kirim_assy');
        $sum_kirim_ppic = Pengiriman::where('tgl_kanban', '=', $date)->sum('kirim_ppic');
        $sum_total_kirim = $sum_kirim_painting + $sum_kirim_assy + $sum_kirim_ppic;

        $kensa = DB::table('kensa AS k')->select('id_masterdata')
            ->selectRaw('ifnull(sum(k.total_ok),0) as total_ok')
            ->selectRaw('ifnull(sum(k.total_ng),0) as total_ng')
            ->where('k.tanggal_k', '=', "$date")
            ->groupBy('k.id_masterdata');

        $kirim = DB::table('pengiriman AS pg')->select('id_masterdata')
            ->selectRaw('ifnull(sum(pg.kirim_painting),0)  as kirim_painting')
            ->selectRaw('ifnull(sum(pg.kirim_assy),0)  as kirim_assy')
            ->selectRaw('ifnull(sum(pg.kirim_ppic),0)  as kirim_ppic')
            ->selectRaw('max(pg.no_kartu)  as no_kartu')
            ->where('pg.tgl_kanban', '=', "$date")
            ->groupBy('pg.id_masterdata');

        $stok = MasterData::select('masterdata.id', 'masterdata.part_name', 'masterdata.no_part', 'pg.kirim_painting', 'pg.kirim_assy', 'pg.kirim_ppic')
            ->selectRaw('masterdata.stok_bc')
            ->selectRaw('ifnull(k.total_ok,0) total_ok')
            ->selectRaw('ifnull(k.total_ng,0) total_ng')
            ->selectRaw('masterdata.stok')
            ->selectRaw('ifnull(pg.kirim_painting + pg.kirim_assy + pg.kirim_ppic,0) as total_kirim')
            ->selectRaw('pg.no_kartu')
            ->joinSub($kensa, 'k', 'k.id_masterdata', '=', 'masterdata.id', 'left')
            ->joinSub($kirim, 'pg', 'pg.id_masterdata', '=', 'masterdata.id', 'left')
            ->groupBy('masterdata.id', 'masterdata.part_name', 'masterdata.no_part')->get();


        return view('stok.stok', compact('stok', 'sum_total_ok', 'sum_total_ng', 'sum_stok_bc', 'sum_stok', 'sum_kirim_painting', 'sum_kirim_assy', 'sum_kirim_ppic', 'sum_total_kirim', 'date'));
    }

    public function lihatPart()
    {
        $part = MasterData::all();
        return view('latihanajax', compact('part'));
    }


    public function cariPart(Request $request)
    {
        $z = Masterdata::select('no_part', 'part_name', 'katalis', 'channel', 'grade_color', 'qty_bar', 'stok_bc')->where('id', $request->id)->first();
        return response()->json($z);
    }

    public function index2()
    {
        $stok_bc = Plating::where('status','=', 2)->get();
        $sum_qty_bar = Plating::where('status', '=', '2')->sum('qty_bar');
        $count_stok_bc = Plating::where('status', '=', '2')->count();
        return view('stok.stok_bc',compact('stok_bc','sum_qty_bar','count_stok_bc'));
    }
}
