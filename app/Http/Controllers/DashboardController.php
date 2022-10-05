<?php

namespace App\Http\Controllers;

use App\Models\kensa;
use App\Models\racking_t;
use App\Models\Stok;
use App\Models\unracking_t;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home(){
        $date = date('Y-m-d');
        $stok = Stok::count();
        $kensa = kensa::count();
        $unracking = unracking_t::count();
        $racking = racking_t::count();
        $racking_today = racking_t::where('tanggal_r', '=', $date)->count();
        return view('dashboard', compact('stok','kensa','unracking', 'racking','racking_today'));
    } 
}
