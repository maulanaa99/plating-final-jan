<?php

namespace App\Http\Controllers;

use App\Models\kensa;
use App\Models\MasterData;
use App\Models\Pengiriman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d') ?? date('Y-m-d');
        $stok = Pengiriman::rightJoin('masterdata', function ($rightJoin) use ($date) {
            $rightJoin->on('masterdata.id', '=', 'pengiriman.id_masterdata')->where('tgl_kanban', '=', $date);
        })
            ->select('pengiriman.kirim_assy', 'pengiriman.kirim_painting', 'pengiriman.kirim_ppic', 'masterdata.part_name', 'masterdata.no_part', 'masterdata.total_ok', 'masterdata.total_ng', 'masterdata.stok', 'masterdata.stok_bc', DB::raw('MAX(pengiriman.no_kartu) as no_kartu'))
            ->groupBy('masterdata.id')
            ->get();

        $sum_total_ok = MasterData::sum('total_ok');
        $sum_total_ng = MasterData::sum('total_ng');
        $sum_stok_bc =  MasterData::sum('stok_bc');
        $sum_stok = MasterData::sum('stok');
        $sum_kirim_painting = Pengiriman::where('tgl_kanban', '=', $date)->sum('kirim_painting');
        $sum_kirim_assy = Pengiriman::where('tgl_kanban', '=', $date)->sum('kirim_assy');
        $sum_kirim_ppic = Pengiriman::where('tgl_kanban', '=', $date)->sum('kirim_ppic');
        $sum_total_kirim = $sum_kirim_painting + $sum_kirim_assy + $sum_kirim_ppic;

        return view('stok.stok', compact('stok', 'sum_total_ok', 'sum_total_ng', 'sum_stok', 'sum_stok_bc', 'sum_kirim_painting', 'sum_kirim_assy', 'sum_kirim_ppic', 'sum_total_kirim', 'date'));
    }

    public function lihatPart(){
        $part = MasterData::all();
        return view('latihanajax',compact('part'));
    }


    public function cariPart(Request $request)
    {
        $z = Masterdata::select('no_part', 'part_name' , 'katalis', 'channel', 'grade_color', 'qty_bar', 'stok_bc')->where('id', $request->id)->first();
        return response()->json($z);
    }
}
