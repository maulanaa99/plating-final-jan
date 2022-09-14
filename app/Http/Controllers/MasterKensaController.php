<?php

namespace App\Http\Controllers;

use App\Models\MasterKensa;
use Illuminate\Http\Request;

class MasterKensaController extends Controller
{
    public function index()
    {
        $masterkensa = MasterKensa::all();
        return view('masterkensa.masterkensa_index', compact('masterkensa'));
    }
}
