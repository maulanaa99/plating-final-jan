<?php

namespace App\Http\Controllers;

use App\Exports\UnrackingExport;
use App\Models\MasterData;
use App\Models\Unracking;
use App\Models\unracking_t;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class UnrackingController_T extends Controller
{
    //tampil data
    public function index(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $plating = unracking_t::join('masterdata', 'masterdata.id', '=', 'plating.id_masterdata')
            ->select('plating.*', 'masterdata.stok_bc')
            ->orderBy('tanggal_r', 'desc')->orderBy('waktu_in_r', 'desc')
            ->where('tanggal_r', '=', $date)
            ->get();
        $masterdata = MasterData::all();
        return view('unracking_t.unracking_t', compact('plating', 'masterdata', 'date'));
    }

    //edit data
    public function edit($id)
    {
        $plating = unracking_t::find($id);
        return view('unracking_t.unracking_t-edit', compact('plating'));
    }

    //update data
    public function update(Request $request, $id)
    {
        $unracking = unracking_t::find($id);
        $qty_aktual_prev = $unracking->qty_aktual;

        $unracking->tanggal_u = $request->tanggal_u;
        $unracking->waktu_in_u = $request->waktu_in_u;
        $unracking->qty_aktual = $request->qty_aktual;
        $unracking->save();

        $masterdata = MasterData::find($unracking->id_masterdata);
        $masterdata->stok_bc = $masterdata->stok_bc - $qty_aktual_prev + $request->qty_aktual;

        $masterdata->save();



        return redirect()->route('unracking_t')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function search(Request $request)
    {
        $keyword = $request->search;
        $plating = unracking_t::where('part_name', 'like', "%" . $keyword . "%")->paginate(124);
        return view('unracking_t.unracking_t', compact('plating'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function searchDater(Request $request)
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $plating = unracking_t::whereBetween('tanggal_u', [$start_date, $end_date])->paginate(75);
        } else {
            $plating = unracking_t::latest()->paginate(75);
        }
        return view('unracking_t.unracking_t', compact('plating'));
    }

    public function exportexcel()
    {
        return Excel::download(new UnrackingExport, 'Unracking.xlsx');
    }

    public function unrackingPrint(Request $request, $id)
    {
        $filepath = storage_path('app/' . md5($id));

        /**
         * PDF
         */
        $data = [];
        $pdf = Pdf::loadView('unracking_t.unracking_t-print', $data)->setPaper([0.0, 0.0, 226.772, 311.811], 'landscape');
        $pdf->save($filepath.'.pdf');
        $pdf = new \Spatie\PdfToImage\Pdf($filepath.'.pdf');
        $pdf->setOutputFormat('png')->saveImage($filepath.'.png');

        $sourceImage = new \Imagick($filepath.'.png');
        $sourceImage->rotateImage(new \ImagickPixel(), 90);
        $sourceImage->writeImage ($filepath.'.png');

        unlink($filepath.'.pdf');

        /**
         * PRINTING
         */
        $connector = new WindowsPrintConnector("TM-T82II");
        $printer = new Printer($connector);

        try {
            $tux = EscposImage::load($filepath.'.png', false);
            $printer->graphics($tux);
            $printer->cut();
        } catch (Exception $e) {
            dd($e->getMessage());
        } finally {
            $printer->close();
        }
        return redirect()->route('unracking_t', compact('unracking'))->with('toast_success', 'Data Berhasil Di Print');
    }

    public function cetak_kanban(Request $request, $id)
    {
        $unracking = $data['plating'] = unracking_t::findOrFail($id);
        $filepath = storage_path('app/' . md5($id));

        /**
         * PDF
         */
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('unracking_t.unracking_t-print', $data)->setPaper([0.0, 0.0, 226.772, 311.811], 'landscape');
        $pdf->save($filepath . '_' . '.pdf');
        $pdf = new \Spatie\PdfToImage\Pdf($filepath . '_' . '.pdf');
        $pdf->setOutputFormat('png')
            ->width(800)
            ->saveImage($filepath . '_' . '.png');

        $sourceImage = new \Imagick($filepath . '_' . '.png');
        $sourceImage->rotateImage(new \ImagickPixel(), 90);
        $sourceImage->writeImage($filepath . '_' . '.png');

        unlink($filepath . '_' . '.pdf');

        /**
         * PRINTING
         */
        $connector = new WindowsPrintConnector("TM-T82II");
        $printer = new Printer($connector);

        try {
            $tux = EscposImage::load($filepath . '_' . '.png', false);
            $printer->graphics($tux);
            $printer->cut();
        } catch (Exception $e) {
            dd($e->getMessage());
        } finally {
            $printer->close();
        }
        return redirect()->route('unracking_t')->with('toast_success', 'Data Berhasil Di Print');
    }
}
