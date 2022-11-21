<?php

namespace App\Http\Controllers;

use App\Models\Pinbosh_Tertinggal;
use Illuminate\Http\Request;

class PinboshTertinggalController extends Controller
{
    public function index(){
        $pinbosh = Pinbosh_Tertinggal::all();

        return view ('racking_t.pinbosh',compact('pinbosh'));
    }
}
