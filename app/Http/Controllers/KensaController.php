<?php

namespace App\Http\Controllers;

use App\Models\kensa;
use App\Models\MasterData;
use App\Models\Pengiriman;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class KensaController extends Controller
{
    //tampil data
    public function index(Request $request)
    {

        $date = Carbon::parse($request->date)->format('Y-m-d');
        $kensa = kensa::join('masterdata', 'masterdata.id', '=', 'kensa.id_masterdata')
            ->select('kensa.*', 'masterdata.part_name')
            ->orderBy('tanggal_k', 'desc')->orderBy('waktu_k', 'desc')
            ->where('tanggal_k', '=', $date)
            ->get();

        $sum_qty_bar = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('qty_bar');
        $sum_nikel = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('nikel');
        $sum_butsu = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('butsu');
        $sum_hadare = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('hadare');
        $sum_hage = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('hage');
        $sum_moyo = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('moyo');
        $sum_fukure = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('fukure');
        $sum_crack = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('crack');
        $sum_henkei = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('henkei');
        $sum_hanazaki = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('hanazaki');
        $sum_kizu = DB::table('kensa')->get()->where('tanggal_k', '=', $date)->sum('kizu');
        $sum_kaburi = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('kaburi');
        $sum_other = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('other');
        $sum_gores = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('gores');
        $sum_regas = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('regas');
        $sum_silver = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('silver');
        $sum_hike = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('hike');
        $sum_burry = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('burry');
        $sum_others = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('others');
        $sum_total_ok = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('total_ok');
        $sum_total_ng = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('total_ng');
        $avg_p_total_ok = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->average('p_total_ok');
        $avg_p_total_ng = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->average('p_total_ng');

        $masterdata = MasterData::all();

        return view('kensa.kensa-index', compact(
            'kensa',
            'masterdata',
            'sum_qty_bar',
            'sum_nikel',
            'sum_butsu',
            'sum_hadare',
            'sum_hage',
            'sum_moyo',
            'sum_fukure',
            'sum_crack',
            'sum_henkei',
            'sum_hanazaki',
            'sum_kizu',
            'sum_kaburi',
            'sum_other',
            'sum_gores',
            'sum_regas',
            'sum_silver',
            'sum_hike',
            'sum_burry',
            'sum_others',
            'sum_total_ok',
            'sum_total_ng',
            'avg_p_total_ok',
            'avg_p_total_ng',
            'date'
        ));
    }

    //tambah data
    public function tambah()
    {
        $kensa = kensa::join('masterdata', 'masterdata.id', '=', 'kensa.id_masterdata')
            ->select('kensa.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->orderBy('tanggal_k', 'desc')
            ->get();

        $masterdata = MasterData::all();
        return view('kensa.kensa-tambah', compact('kensa', 'masterdata'));
    }

    //simpan data
    public function simpan(Request $request)
    {
        $masterdata = MasterData::find($request->id_masterdata);
        if ($masterdata->stok_bc < $request->qty_bar) {
            return redirect()->route('kensa.tambah')->with('errors', 'Gagal!, Stok Kurang');
        }
        kensa::create([
            'tanggal_k' => $request->tanggal_k,
            'waktu_k' => $request->waktu_k,
            'id_masterdata' => $request->id_masterdata,
            'no_part' => $request->no_part,
            'part_name' => $request->part_name,
            'no_bar' => $request->no_bar,
            'qty_bar' => $request->qty_bar,
            'cycle' => $request->cycle,
            'nikel' => $request->nikel,
            'butsu' => $request->butsu,
            'hadare' => $request->hadare,
            'hage' => $request->hage,
            'moyo' => $request->moyo,
            'fukure' => $request->fukure,
            'crack' => $request->crack,
            'henkei' => $request->henkei,
            'hanazaki' => $request->hanazaki,
            'kizu' => $request->kizu,
            'kaburi' => $request->kaburi,
            'shiromoya' => $request->shiromoya,
            'shimi' => $request->shimi,
            'pitto' => $request->pitto,
            'other' => $request->other,
            'gores' => $request->gores,
            'regas' => $request->regas,
            'silver' => $request->silver,
            'hike' => $request->hike,
            'burry' => $request->burry,
            'others' => $request->others,
            'total_ok' => $request->total_ok,
            'total_ng' => $request->total_ng,
            'p_total_ok' => $request->p_total_ok,
            'p_total_ng' => $request->p_total_ng,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $masterdata->stok_bc -= $request->total_ok;
        $masterdata->stok_bc -= $request->total_ng;
        $masterdata->stok += $request->total_ok;
        $masterdata->total_ng += $request->total_ng;
        $masterdata->total_ok += $request->total_ok;
        $masterdata->save();

        return redirect()->route('kensa.tambah')->with('success', 'Data berhasil disimpan');
    }

    //edit data
    public function edit($id)
    {
        $kensa = DB::table('kensa')->where('id', $id)->first();
        $masterdata = MasterData::all();
        return view('kensa.kensa-edit', compact('kensa', 'masterdata'));
    }

    //hapus data
    public function delete($id)
    {
        $kensa = kensa::find($id);
        $kensa = kensa::where('id_masterdata', '=', $kensa->id_masterdata)->first();
        if(!$kensa){
            $masterdata = MasterData::find($kensa->id_masterdata);
            $masterdata->stok = $masterdata->stok - $kensa->total_ok;
            dd($kensa->total_ok);
            $masterdata->save();

            $kensa->delete();
            return redirect('kensa')->with('toast_error', 'Data gagal dihapus');
        }
        return redirect('kensa')->with('toast_success', 'Data berhasil dihapus');
    }

    //update data
    public function update(Request $request, $id)
    {
        $kensa = kensa::find($id);
        $total_ok_prev = $kensa->total_ok;

        $kensa->tanggal_k = $request->tanggal_k;
        $kensa->waktu_k = $request->waktu_k;
        $kensa->no_part = $request->no_part;
        $kensa->part_name = $request->part_name;
        $kensa->no_bar = $request->no_bar;
        $kensa->qty_bar = $request->qty_bar;
        $kensa->cycle = $request->cycle;
        $kensa->nikel = $request->nikel;
        $kensa->butsu = $request->butsu;
        $kensa->hadare = $request->hadare;
        $kensa->hage = $request->hage;
        $kensa->moyo = $request->moyo;
        $kensa->fukure = $request->fukure;
        $kensa->crack = $request->crack;
        $kensa->henkei = $request->henkei;
        $kensa->hanazaki = $request->hanazaki;
        $kensa->kizu = $request->kizu;
        $kensa->kaburi = $request->kaburi;
        $kensa->other = $request->other;
        $kensa->gores = $request->gores;
        $kensa->regas = $request->regas;
        $kensa->silver = $request->silver;
        $kensa->hike = $request->hike;
        $kensa->burry = $request->burry;
        $kensa->others = $request->others;
        $kensa->total_ok = $request->total_ok;
        $kensa->total_ng = $request->total_ng;
        $kensa->p_total_ok = $request->p_total_ok;
        $kensa->p_total_ng = $request->p_total_ng;
        $kensa->save();

        $masterdata = MasterData::find($kensa->id_masterdata);
        $masterdata->stok = ($masterdata->stok - $total_ok_prev) + (int)$request->total_ok;
        $masterdata->save();

        return redirect()->route('kensa.tambah')->with('message', 'Data berhasil di update');
    }

    public function printKanban()
    {
        $pengiriman = Pengiriman::join('masterdata', 'masterdata.id', '=', 'pengiriman.id_masterdata')
            ->select('pengiriman.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->get();

        $masterdata = MasterData::all();

        return view('kensa.print-kanban', compact('pengiriman', 'masterdata'));
    }

    public function ajax(Request $request)
    {
        $id_masterdata['id_masterdata'] = $request->id_masterdata;
        $ajax_barang = MasterData::where('id', $id_masterdata)->get();

        return view('kensa.kensa-ajax', compact('ajax_barang'));
    }

    public function ajaxKanban(Request $request)
    {
        $id_masterdata['id_masterdata'] = $request->id_masterdata;
        $ajax_barang = MasterData::where('id', $id_masterdata)->get();

        $date = Carbon::parse($request->tgl_kanban)->format('Y-m-d');
        $q = $ajax_barang->first()->pengirimans()->where('tgl_kanban', '=', $date)->orderBy('id', 'desc')->first();
        $kode = $q ? $q->no_kartu + 1 : '0001';

        return view('kensa.print-kanban-ajax', compact('ajax_barang', 'kode'));
    }

    public function kanbansimpan(Request $request)
    {
        $masterdata = MasterData::find($request->id_masterdata);

        if ($masterdata->stok < $request->kirim_assy) {
            return redirect()->route('kensa.printKanban')->with('errors', 'Gagal!, Stok Kurang');
        } else if ($masterdata->stok < $request->kirim_painting) {
            return redirect()->route('kensa.printKanban')->with('errors', 'Gagal!, Stok Kurang');
        } else if ($masterdata->stok < $request->kirim_ppic) {
            return redirect()->route('kensa.printKanban')->with('errors', 'Gagal!, Stok Kurang');
        } else {
            $pengiriman = Pengiriman::create([
                'tgl_kanban' => $request->tgl_kanban,
                'id_masterdata' => $request->id_masterdata,
                'no_part' => $request->no_part,
                'part_name' => $request->part_name,
                'model' => $request->model,
                'bagian' => $request->bagian,
                'no_kartu' => $request->no_kartu,
                'next_process' => $request->next_process,
                'kirim_painting' => $request->kirim_painting,
                'kirim_assy' => $request->kirim_assy,
                'kirim_ppic' => $request->kirim_ppic,
                'std_qty' => $request->std_qty,
                'created_by' => Auth::user()->name,
                'created_at' => Carbon::now(),
            ]);
            $masterdata->stok -= $request->kirim_assy;
            $masterdata->total_ok -= $request->kirim_assy;
            $masterdata->stok -= $request->kirim_painting;
            $masterdata->total_ok -= $request->kirim_painting;
            $masterdata->stok -= $request->kirim_ppic;
            $masterdata->total_ok -= $request->kirim_ppic;
            $masterdata->kirim_assy += $request->kirim_assy;
            $masterdata->kirim_painting += $request->kirim_painting;
            $masterdata->kirim_ppic += $request->kirim_ppic;
            $masterdata->no_kartu = $request->no_kartu;
            $masterdata->save();

            return redirect()->route('kensa.cetak_kanban',  ['id' => $pengiriman->id]);
        }
    }

    public function cetak_kanban(Request $request, $id)
    {
        $pengiriman = $data['pengiriman'] = Pengiriman::findOrFail($id);
        $filepath = storage_path('app/' . md5($id));

        /**
         * PDF
         */

        $jumlah = $pengiriman->kirim_assy + $pengiriman->kirim_painting + $pengiriman->kirim_ppic;
        $print = ceil($jumlah / $pengiriman->std_qty);
        $sisa = $jumlah;
        $jml_print = $pengiriman->no_kartu + $print - 1;

        foreach (range($pengiriman->no_kartu, $jml_print) as $i) {
            $data['no_kartu'] = $i;
            $data['qty'] = $sisa >= $pengiriman->std_qty ? $pengiriman->std_qty : $sisa;
            $sisa = $jumlah - $pengiriman->std_qty;

            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('kensa.cetak-kanban', $data)->setPaper([0.0, 0.0, 226.772, 311.811], 'landscape');
            $pdf->save($filepath . '_' . $i . '.pdf');
            $pdf = new \Spatie\PdfToImage\Pdf($filepath . '_' . $i . '.pdf');
            $pdf->setOutputFormat('png')
                ->width(800)
                ->saveImage($filepath . '_' . $i . '.png');

            $sourceImage = new \Imagick($filepath . '_' . $i . '.png');
            $sourceImage->rotateImage(new \ImagickPixel(), 90);
            $sourceImage->writeImage($filepath . '_' . $i . '.png');

            unlink($filepath . '_' . $i . '.pdf');

            /**
             * PRINTING
             */
            $connector = new WindowsPrintConnector("TM-T82II");
            $printer = new Printer($connector);

            try {
                $tux = EscposImage::load($filepath . '_' . $i . '.png', false);
                $printer->graphics($tux);
                $printer->cut();
            } catch (Exception $e) {
                dd($e->getMessage());
            } finally {
                $printer->close();
            }
        }
        $pengiriman->no_kartu = $jml_print;
        $pengiriman->save();
        return redirect()->route('kensa.printKanban')->with('toast_success', 'Data Berhasil Di Print');
    }

    public function pengiriman()
    {
        $pengiriman = Pengiriman::join('masterdata', 'masterdata.id', '=', 'pengiriman.id_masterdata')
            ->select('pengiriman.*', 'masterdata.part_name', 'masterdata.qty_bar')
            ->get();
        $masterdata = MasterData::all();
        return view('kensa.pengiriman-index', compact('pengiriman', 'masterdata'));
    }

    public function utama(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $sum_qty_bar = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('qty_bar');
        $sum_total_ng = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('total_ng');
        $sum_nikel = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('nikel');
        $nikel = $sum_nikel != 0 && $sum_qty_bar != 0 ? (($sum_nikel / $sum_qty_bar) * 100) : 0;
        $sum_butsu = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('butsu');
        $butsu = $sum_butsu != 0 && $sum_qty_bar != 0 ? (($sum_butsu / $sum_qty_bar) * 100) : 0;
        $sum_hadare = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('hadare');
        $hadare = $sum_hadare != 0 && $sum_qty_bar != 0 ? (($sum_hadare / $sum_qty_bar) * 100) : 0;
        $sum_hage = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('hage');
        $hage = $sum_hage != 0 && $sum_qty_bar != 0 ? (($sum_hage / $sum_qty_bar) * 100) : 0;
        $sum_moyo = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('moyo');
        $moyo = $sum_moyo != 0 && $sum_qty_bar != 0 ? (($sum_moyo / $sum_qty_bar) * 100) : 0;
        $sum_fukure = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('fukure');
        $fukure = $sum_fukure != 0 && $sum_qty_bar != 0 ? (($sum_fukure / $sum_qty_bar) * 100) : 0;
        $sum_crack = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('crack');
        $crack = $sum_crack != 0 && $sum_qty_bar != 0 ? (($sum_crack / $sum_qty_bar) * 100) : 0;
        $sum_henkei = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('henkei');
        $henkei = $sum_henkei != 0 && $sum_qty_bar != 0 ? (($sum_henkei / $sum_qty_bar) * 100) : 0;
        $sum_hanazaki = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('hanazaki');
        $hanazaki = $sum_hanazaki != 0 && $sum_qty_bar != 0 ? (($sum_hanazaki / $sum_qty_bar) * 100) : 0;
        $sum_kizu = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('kizu');
        $kizu = $sum_kizu != 0 && $sum_qty_bar != 0 ? (($sum_kizu / $sum_qty_bar) * 100) : 0;
        $sum_kaburi = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('kaburi');
        $kaburi = $sum_kaburi != 0 && $sum_qty_bar != 0 ? (($sum_kaburi / $sum_qty_bar) * 100) : 0;
        $sum_shiromoya = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('shiromoya');
        $shiromoya = $sum_shiromoya != 0 && $sum_qty_bar != 0 ? (($sum_shiromoya / $sum_qty_bar) * 100) : 0;
        $sum_shimi = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('shimi');
        $shimi = $sum_shimi != 0 && $sum_qty_bar != 0 ? (($sum_shimi / $sum_qty_bar) * 100) : 0;
        $sum_pitto = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('pitto');
        $pitto = $sum_pitto != 0 && $sum_qty_bar != 0 ? (($sum_pitto / $sum_qty_bar) * 100) : 0;
        $sum_other = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('other');
        $other = $sum_other != 0 && $sum_qty_bar != 0 ? (($sum_other / $sum_qty_bar) * 100) : 0;
        $sum_gores = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('gores');
        $gores = $sum_gores != 0 && $sum_qty_bar != 0 ? (($sum_gores / $sum_qty_bar) * 100) : 0;
        $sum_regas = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('regas');
        $regas = $sum_regas != 0 && $sum_qty_bar != 0 ? (($sum_regas / $sum_qty_bar) * 100) : 0;
        $sum_silver = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('silver');
        $silver = $sum_silver != 0 && $sum_qty_bar != 0 ? (($sum_silver / $sum_qty_bar) * 100) : 0;
        $sum_hike = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('hike');
        $hike = $sum_hike != 0 && $sum_qty_bar != 0 ? (($sum_hike / $sum_qty_bar) * 100) : 0;
        $sum_burry = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('burry');
        $burry = $sum_burry != 0 && $sum_qty_bar != 0 ? (($sum_burry / $sum_qty_bar) * 100) : 0;
        $sum_others = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('others');
        $others = $sum_others != 0 && $sum_qty_bar != 0 ? (($sum_others / $sum_qty_bar) * 100) : 0;
        $sum_total_ok = DB::table('kensa')->where('tanggal_k', '=', $date)->get()->sum('total_ok');
        $total_ok = $sum_total_ok != 0 && $sum_qty_bar != 0 ? (($sum_total_ok / $sum_qty_bar) * 100) : 0;
        $total_ng = $sum_total_ng != 0 && $sum_qty_bar != 0 ? (($sum_total_ng / $sum_qty_bar) * 100) : 0;
        $kensa_today = kensa::where('tanggal_k', '=', $date)->count();

        return view('kensa.kensa_menu_utama', compact(
            'nikel',
            'sum_nikel',
            'butsu',
            'sum_butsu',
            'hadare',
            'sum_hadare',
            'hage',
            'sum_hage',
            'moyo',
            'sum_moyo',
            'fukure',
            'sum_fukure',
            'crack',
            'sum_crack',
            'henkei',
            'sum_henkei',
            'hanazaki',
            'sum_hanazaki',
            'kizu',
            'sum_kizu',
            'kaburi',
            'sum_kaburi',
            'shiromoya',
            'sum_shiromoya',
            'shimi',
            'sum_shimi',
            'pitto',
            'sum_pitto',
            'other',
            'sum_other',
            'gores',
            'sum_gores',
            'regas',
            'sum_regas',
            'silver',
            'sum_silver',
            'hike',
            'sum_hike',
            'burry',
            'sum_burry',
            'others',
            'sum_others',
            'total_ok',
            'total_ng',
            'date',
            'sum_qty_bar',
            'kensa_today'
        ));
    }
}
