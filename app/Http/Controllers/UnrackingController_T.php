<?php

namespace App\Http\Controllers;

use App\Exports\UnrackingExport;
use App\Models\MasterData;
use App\Models\Plating;
use App\Models\unracking_t;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Yajra\DataTables\Facades\DataTables;
use Log;

class UnrackingController_T extends Controller
{
    //tampil data
    public function index(Request $request)
    {
        // $date = Carbon::parse($request->date)->format('Y-m-d');
        // $plating = unracking_t::join('masterdata', 'masterdata.id', '=', 'plating.id_masterdata')
        //     ->select('plating.*', 'masterdata.stok_bc')
        //     ->whereNull('tanggal_u')
        //     // ->orderBy('tanggal_r', 'desc')->orderBy('waktu_in_r', 'desc')
        //     ->get();

        // $plating = unracking_t::join('masterdata', 'masterdata.id', '=', 'plating.id_masterdata')
        //     ->select('plating.*', 'masterdata.stok_bc')
        //     ->where('status', '=', '0')
        //     ->get();

        // $masterdata = MasterData::all();
        // return view('unracking_t.unracking_t', compact('plating', 'masterdata', 'date'));

        // if ($request->ajax()) {
        //     $data = unracking_t::select('*');
        //     return DataTables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){

        //                    $btn = '<a href="unracking_t/{id}/edit" class="edit btn btn-primary btn-sm">View</a>';

        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }

        // return view('unracking_t.unracking_t');

        // $startOfWeek = Carbon::parse($request->startofWeek)->format('Y-m-d');
        // $endOfWeek = Carbon::parse($request->endOfWeek)->format('Y-m-d');
        // $plating = unracking_t::whereBetween('tanggal_r', [$startOfWeek, $endOfWeek])
        //     ->orderBy('tanggal_r', 'desc')->orderBy('waktu_in_r', 'asc')
        //     ->get();
        // return view('unracking_t.unracking_t', compact('plating','startOfWeek','endOfWeek'));

        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        $plating = Plating::whereBetween('tanggal_r', [$start_date, $end_date])
            ->orderBy('tanggal_r', 'desc')
            ->orderBy('waktu_in_r', 'desc')
            ->get();
        return view('unracking_t.unracking_t', compact('plating', 'start_date', 'end_date'));
    }

    //edit data
    public function edit($id)
    {
        $plating = unracking_t::find($id);
        $masterdata = MasterData::find($plating->id_masterdata);

        $previous = unracking_t::where('id', '<', $plating->id)->max('id');
        $next = unracking_t::where('id', '>', $plating->id)->min('id');

        return View::make('unracking_t.unracking_t-edit', compact('plating', 'masterdata'))->with('previous', $previous)->with('next', $next);
    }

    //update data
    public function update(Request $request, $id)
    {
        $plating = Plating::find($id);
        $qty_aktual_prev = $plating->qty_aktual;

        $plating->tanggal_u = $request->tanggal_u;
        $plating->waktu_in_u = $request->waktu_in_u;
        $plating->qty_aktual = $request->qty_aktual;
        $plating->cycle = $request->cycle;
        $plating->updated_by = Auth::user()->name;
        $plating->status = '2';
        $plating->save();

        $masterdata = MasterData::find($plating->id_masterdata);
        $masterdata->stok_bc = $masterdata->stok_bc - $qty_aktual_prev + $request->qty_aktual;

        $masterdata->save();

        // Log::debug('next : '.$request->next);
        if(isset($request->next)){
           return redirect('/unracking_t/edit/'.$request->next);
        }else{
            $previous = unracking_t::where('id', '<', $plating->id)->max('id');
            $next = unracking_t::where('id', '>', $plating->id)->min('id');

            // return redirect()->route('unracking_t.edit',compact('unracking'))->with('previous', $previous)->with('next', $next);
            return View::make('unracking_t.unracking_t-edit', compact('plating', 'masterdata'))->with('previous', $previous)->with('next', $next)->with('success', 'Data berhasil ditambahkan!');
        }
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

    public function unrackingPrint($id)
    {
        $plating = $data['plating'] = unracking_t::findOrFail($id);
        $filepath = storage_path('app/unracking' . md5($id));

        /**
         * PDF
         */

        $previous_number = 0;
        $print = 0;

        foreach (range($previous_number, $print) as $i) {
            $data['qty'] = $plating->qty_aktual;
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('unracking_t.unracking_t-print', $data)->setPaper([0.0, 0.0, 226.772, 311.811], 'landscape');
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
            $plating->save();
        }
        return redirect()->route('unracking_t')->with('toast_success', 'Data Berhasil Di Print');
    }
}
