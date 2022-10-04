<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KensaController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\MasterKensaController;
use App\Http\Controllers\RackingController_T;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UnrackingController_T;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/tes', function () {
    return view('tes');
})->name('tes');

Route::get('/', [DashboardController::class, 'home'])->name('dashboard');



Route::get('masterdata', [MasterDataController::class, 'index'])->name('master');
Route::get('masterdata/tambah', [MasterDataController::class, 'tambah'])->name('master.tambah');
Route::post('masterdata', [MasterDataController::class, 'simpan'])->name('master.simpan');
Route::post('masterdata/{id}', [MasterDataController::class, 'delete'])->name('master.delete');
Route::get('masterdata/{id}/edit', [MasterDataController::class, 'edit'])->name('master.edit');
Route::get('masterdata/{id}/show', [MasterDataController::class, 'show'])->name('master.show');
Route::patch('masterdata/{id}', [MasterDataController::class, 'update'])->name('master.update');
Route::get('masterdata/export_excel', [MasterDataController::class, 'exportexcel'])->name('master.export');
Route::post('masterdata/import_excel', [MasterDataController::class, 'importexcel'])->name('master.import');
Route::get('masterdata/search', [MasterDataController::class, 'search'])->name('master.search');
Route::get('/masterdata/{id}', [MasterDataController::class, 'getDataParts']);


// ==========================RACKING=====================================================================

Route::get('racking_t', [RackingController_T::class, 'index'])->name('racking_t');
Route::get('racking_t/tambah', [RackingController_T::class, 'tambah'])->name('racking_t.tambah');
Route::post('racking_t', [RackingController_T::class, 'simpan'])->name('racking_t.simpan');
Route::delete('racking_t/delete/{id}', [RackingController_T::class, 'delete'])->name('racking_t.delete');
Route::get('racking_t/{id}/edit', [RackingController_T::class, 'edit'])->name('racking_t.edit');
Route::patch('racking_t/{id}', [RackingController_T::class, 'update'])->name('racking_t.update');
Route::get('racking_t/export_excel', [RackingController_T::class, 'exportexcel'])->name('racking_t.export');
Route::get('racking_t/autocomplete/{id}', [RackingController_T::class, 'autocomplete'])->name('autocomplete_t');
Route::get('racking_t/search', [RackingController_T::class, 'search'])->name('racking_t.search');
Route::get('racking_t/searchdate', [RackingController_T::class, 'searchDate'])->name('racking_t.searchdate');


// ==========================UNRACKING=====================================================================
Route::get('unracking_t', [UnrackingController_T::class, 'index'])->name('unracking_t');
Route::get('unracking_t/tambah', [UnrackingController_T::class, 'tambah'])->name('unracking_t.tambah');
Route::post('unracking_t', [UnrackingController_T::class, 'simpan'])->name('unracking_t.simpan');
Route::delete('unracking_t/delete/{id}', [UnrackingController_T::class, 'delete'])->name('unracking_t.delete');
Route::get('unracking_t/{id}/edit', [UnrackingController_T::class, 'edit'])->name('unracking_t.edit');
Route::patch('unracking_t/{id}', [UnrackingController_T::class, 'update'])->name('unracking_t.update');
Route::get('unracking_t/export_excel', [UnrackingController_T::class, 'exportexcel'])->name('unracking_t.export');
Route::get('unracking_t/autocomplete1', [UnrackingController_T::class, 'autocomplete1'])->name('autocomplete1_t');
Route::get('unracking_t/search', [UnrackingController_T::class, 'search'])->name('unracking_t.search');
Route::get('unracking_t/searchdater', [UnrackingController_T::class, 'searchDater'])->name('unracking_t.searchdater');
Route::get('unracking_t/print/{id}', [UnrackingController_T::class, 'unrackingPrint'])->name('unracking_t.print');

// ==========================KENSA=====================================================================
Route::get('kensa', [KensaController::class, 'index'])->name('kensa');
Route::get('kensa/tambah', [KensaController::class, 'tambah'])->name('kensa.tambah');
Route::post('kensa', [KensaController::class, 'simpan'])->name('kensa.simpan');
Route::delete('kensa/delete/{id}', [KensaController::class, 'delete'])->name('kensa.delete');
Route::get('kensa/{id}/edit', [KensaController::class, 'edit'])->name('kensa.edit');
Route::patch('kensa/{id}', [KensaController::class, 'update'])->name('kensa.update');
Route::get('kensa/export_excel', [KensaController::class, 'exportexcel'])->name('kensa.export');
Route::get('kensa/autocomplete/{id}', [KensaController::class, 'autocomplete'])->name('autocomplete_t');
Route::get('kensa/search', [KensaController::class, 'search'])->name('kensa.search');
Route::get('kensa/searchdater', [KensaController::class, 'searchDater'])->name('kensa.searchDate');
Route::get('kensa/pengiriman', [KensaController::class, 'pengiriman'])->name('kensa.pengiriman');
Route::get('kensa/print_kanban', [KensaController::class, 'printKanban'])->name('kensa.printKanban');
Route::post('kensa/print_kanban/simpan', [KensaController::class, 'kanbansimpan'])->name('kensa.kanban-simpan');
Route::get('kensa/print_kanban/ajax', [KensaController::class, 'ajaxKanban'])->name('kensa.ajaxKanban');
Route::get('kensa/ajax', [KensaController::class, 'ajax'])->name('kensa.ajax');
Route::get('kensa/print_kanban/cetak_kanban/{id}', [KensaController::class, 'cetak_kanban'])->name('kensa.cetak_kanban');
Route::get('kensa/utama', [KensaController::class, 'utama'])->name('kensa.utama');


//=====================STOCK==============================================================================
Route::get('stok', [StokController::class, 'index'])->name('stok');
Route::get('masterkensa', [MasterKensaController::class, 'index'])->name('msterkensa');
Route::get('masterdata/downloadPDF/{id}', [MasterDataController::class, 'downloadPDF'])->name('masterdata.downloadPDF');

