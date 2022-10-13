<?php

namespace App\Http\Controllers;

use App\Exports\MasterDataExport;
use App\Imports\MasterDataImport;
use App\Models\MasterData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class MasterDataController extends Controller
{
    //tampil data
    public function index()
    {
        $masterdata = MasterData::all();
        
        return view('masterdata.index', compact('masterdata'));
    }

    //tambah data
    public function tambah(){
        return view('masterdata.masterdata-tambah');
    }

    //simpan data
    public function simpan(Request $request){

        $validatedData = $request->validate([
            'no_part' => 'required',
            'part_name' => 'required',
            'katalis' => 'required',
            'channel' => 'required',
            'grade_color' => 'required',
            'qty_bar' => 'required',
            'qty_trolly' => 'required',
            'bagian' => 'required',
            'next_process' => 'required',
            'model' => 'required',

          ], [

            'no_part.required' => 'No Part Harus Diisi!',
            'part_name.required' => 'Part Name Harus Diisi!',
            'katalis.required' => 'Katalis Harus Diisi!',
            'channel.required' => 'Channel Harus Diisi!',
            'grade_color.required' => 'Grade Color Harus Diisi!',
            'qty_bar.required' => 'Qty Bar Harus Diisi!',
            'qty_trolly.required' => 'Qty Trolly Harus Diisi!',
            'bagian.required' => 'Bagian Harus Diisi!',
            'next_process.required' => 'Next Process Harus Diisi!',
            'model.required' => 'Model Harus Diisi!',

        ]);

        MasterData::create([
            'no_part' => $request->no_part,
            'part_name' => $request->part_name,
            'katalis' => $request->katalis,
            'channel' => $request->channel,
            'grade_color' => $request->grade_color,
            'qty_bar' => $request->qty_bar,
            'qty_trolly' => $request->qty_trolly,
            'bagian' => $request->bagian,
            'next_process' => $request->next_process,
            'model' => $request->model,
        ]);
        
        // DB::table('masterdata')->insert([
        //     'no_part' => $request->no_part,
        //     'part_name' => $request->part_name,
        //     'katalis' => $request->katalis,
        //     'channel' => $request->channel,
        //     'grade_color' => $request->grade_color,
        //     'qty_bar' => $request->qty_bar,
        //     'stok' => $request->stok
        // ]);
        return redirect()->route('master')->with('success','Data Berhasil Disimpan!');
    }

    //edit data
    public function edit($id){
		$masterdata = DB::table('masterdata')->where('id',$id)->first();
		return view('masterdata.masterdata-edit',['masterdata' => $masterdata]);
    }

    public function show($id){
		$masterdata = DB::table('masterdata')->where('id',$id)->first();
		return view('masterdata.masterdata-show',['masterdata' => $masterdata]);
    }

    //hapus data
    public function delete($id){
        $masterdata = MasterData::find($id);
        $masterdata->delete();
        return redirect('masterdata')->with('success', 'Data Berhasil Dihapus!');
    }

    //update data
    public function update(Request $request){
        // update data pegawai
		DB::table('masterdata')->where('id',$request->id)->update([
			'no_part' => $request->no_part,
            'part_name' => $request->part_name,
            'katalis' => $request->katalis,
            'channel' => $request->channel,
            'grade_color' => $request->grade_color,
            'qty_bar' => $request->qty_bar
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('masterdata')->with('success', 'Data Berhasil Diperbarui!');
    }

    //export data excel
    public function exportexcel(){
        return Excel::download(new MasterDataExport, 'MasterDataPart.xlsx');
    }

    public function importexcel(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        // menangkap file excel
        $file = $request->file('file');
    
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
    
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_masterdata',$nama_file);
    
        // import data
        Excel::import(new MasterDataImport, public_path('/file_masterdata/'.$nama_file));
    
        // notifikasi dengan session
        Session::flash('sukses','Master Data Berhasil Diimport!');
    
        // alihkan halaman kembali
        return redirect('masterdata');  
    }

    //cari data
    public function search(Request $request){
        $keyword = $request->search;
        $masterdata = MasterData::where('part_name', 'like', "%" . $keyword . "%")->paginate(50);
        return view('masterdata.index', compact('masterdata'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function getDataParts($id)
    {
        if (empty($id)) {
            return [];
        }
        $datas = DB::table('masterdata')
            ->where('masterdata.part_name', 'LIKE', "$id%")
            ->limit(25)
            ->get();

        return $datas;  
    }

    public function downloadPDF(Request $request, $id){
        $data['masterdata'] = MasterData::find($id);
        dd($data);
    }

    

}
