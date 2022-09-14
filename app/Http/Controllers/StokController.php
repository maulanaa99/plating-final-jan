<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::all();
        return view('stok.stok', compact('stok'));
    }

    public function tambah()
    {

    }

    public function simpan(Request $request)
    {
    }
}
