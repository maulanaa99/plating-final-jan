<?php

namespace App\Http\Controllers;

use App\Models\kensa;
use App\Models\MasterData;
use App\Models\Plating;
use App\Models\racking_t;
use App\Models\Stok;
use App\Models\unracking_t;

class DashboardController extends Controller
{
    public function home(){
        $date = date('Y-m-d');
        $stok = Stok::count();
        $kensa = kensa::count();
        $unracking = unracking_t::count();
        $racking = racking_t::count();
        $racking_today = racking_t::where('tanggal_r', '=', $date)->count();
        $avail_stock = MasterData::where('stok', '>=', 0)->orderByDesc('stok')->paginate(5);
        $bc_stock = MasterData::where('stok_bc', '>=', 0)->orderByDesc('stok_bc')->paginate(5);
        return view('dashboard', compact('stok','kensa','unracking', 'racking','racking_today','avail_stock','bc_stock'));
    }
}
