<?php

namespace App\Http\Controllers;

use App\Imports\RencanaProduksiImport;
use App\Models\Rencana_Produksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class RencanaProduksiController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $rencana_produksi = Rencana_Produksi::select('tanggal', 'part_name', 'channel', 'qty_bar')->where('tanggal', '=', $date)->get();

        $rencana_produksis = DB::table('rencana_produksi')
            ->select('tanggal', 'part_name', 'channel', 'qty_bar', DB::raw('count(qty_bar) as jumlah_bar'), DB::raw('sum(qty_bar) as total_qty'))
            ->where('tanggal', '=', $date)
            ->groupBy('part_name')
            ->get();

        // $sum_jumlah_bar = DB::table('rencana_produksi')->sum('qty_bar');
        $sum_total_qty = Rencana_Produksi::where('tanggal', '=', $date)->sum('qty_bar');
        $sum_jumlah_bar = DB::table('rencana_produksi')->where('tanggal', '=', $date)->count('qty_bar');

        return view('rencana_produksi', compact('rencana_produksi', 'rencana_produksis', 'sum_jumlah_bar', 'sum_total_qty','date'));
    }
    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_rencana_produksi', $nama_file);

        // import data
        Excel::import(new RencanaProduksiImport, public_path('/file_rencana_produksi/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Master Data Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect()->route('rencana_produksi');
    }
}
