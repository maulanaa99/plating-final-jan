<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::all();
        $sum_total_ok = DB::table('masterdata')->get()->sum('total_ok');
        $sum_total_ng = DB::table('masterdata')->get()->sum('total_ng');
        $sum_stok = DB::table('masterdata')->get()->sum('stok');
        $sum_kirim_painting = DB::table('masterdata')->get()->sum('kirim_painting');
        $sum_kirim_assy = DB::table('masterdata')->get()->sum('kirim_assy');

        $total_kirim = $stats = DB::table('masterdata')->get()->sum('total_kirim');
        return view('stok.stok', compact('stok', 'sum_total_ok', 'sum_total_ng', 'sum_stok', 'sum_kirim_painting', 'sum_kirim_assy', 'total_kirim'));
    }

    public function tambah()
    {
    }

    public function simpan(Request $request)
    {
    }
}
