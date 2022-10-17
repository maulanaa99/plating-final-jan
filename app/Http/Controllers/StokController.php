<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\Pengiriman;
use App\Models\Stok;
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
            ->select('pengiriman.kirim_assy', 'pengiriman.kirim_painting', 'pengiriman.kirim_ppic' , 'masterdata.part_name', 'masterdata.no_part', 'masterdata.total_ok', 'masterdata.total_ng', 'masterdata.stok', DB::raw('MAX(pengiriman.no_kartu) as no_kartu'))
            // ->where('tgl_kanban', '=', $date)
            ->groupBy('masterdata.id')
            ->get();
        $sum_total_ok = DB::table('masterdata')->get()->sum('total_ok');
        $sum_total_ng = DB::table('masterdata')->get()->sum('total_ng');
        $sum_stok = DB::table('masterdata')->get()->sum('stok');
        $sum_kirim_painting = DB::table('pengiriman')->where('tgl_kanban', '=', $date)->get()->sum('kirim_painting');
        $sum_kirim_assy = DB::table('pengiriman')->where('tgl_kanban', '=', $date)->get()->sum('kirim_assy');
        $sum_kirim_ppic = DB::table('pengiriman')->where('tgl_kanban', '=', $date)->get()->sum('kirim_ppic');
        $sum_total_kirim = $sum_kirim_painting + $sum_kirim_assy + $sum_kirim_ppic;

        return view('stok.stok', compact('stok', 'sum_total_ok', 'sum_total_ng', 'sum_stok', 'sum_kirim_painting', 'sum_kirim_assy', 'sum_kirim_ppic', 'sum_total_kirim', 'date'));
    }
}
