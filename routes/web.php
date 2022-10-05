<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KensaController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\MasterKensaController;
use App\Http\Controllers\RackingController_T;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UnrackingController_T;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'home'])->middleware(['auth'])->name('dashboard');

Route::controller(AdminController::class)->middleware(['auth'])->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit/profile', 'editprofile')->name('edit.profile');
    Route::post('/store/profile', 'storeprofile')->name('store.profile');
});

// Supplier All Route
Route::controller(MasterDataController::class)->middleware(['auth'])->group(function () {
    Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');
    Route::get('masterdata', 'index')->name('master');
    Route::get('masterdata/tambah', 'tambah')->name('master.tambah');
    Route::post('masterdata', 'simpan')->name('master.simpan');
    Route::post('masterdata/{id}', 'delete')->name('master.delete');
    Route::get('masterdata/{id}/edit', 'edit')->name('master.edit');
    Route::get('masterdata/{id}/show', 'show')->name('master.show');
    Route::patch('masterdata/{id}', 'update')->name('master.update');
    Route::get('masterdata/export_excel', 'exportexcel')->name('master.export');
    Route::post('masterdata/import_excel', 'importexcel')->name('master.import');
    Route::get('masterdata/search', 'search')->name('master.search');
    Route::get('/masterdata/{id}', 'getDataParts');
});

Route::controller(RackingController_T::class)->middleware(['auth'])->group(function () {
    Route::get('racking_t', 'index')->name('racking_t');
    Route::get('racking_t/tambah', 'tambah')->name('racking_t.tambah');
    Route::post('racking_t', 'simpan')->name('racking_t.simpan');
    Route::delete('racking_t/delete/{id}', 'delete')->name('racking_t.delete');
    Route::get('racking_t/{id}/edit', 'edit')->name('racking_t.edit');
    Route::patch('racking_t/{id}', 'update')->name('racking_t.update');
    Route::get('racking_t/export_excel', 'exportexcel')->name('racking_t.export');
    Route::get('racking_t/autocomplete/{id}', 'autocomplete')->name('autocomplete_t');
    Route::get('racking_t/search', 'search')->name('racking_t.search');
    Route::get('racking_t/searchdate', 'searchDate')->name('racking_t.searchdate');
});

Route::controller(UnrackingController_T::class)->middleware(['auth'])->group(function () {
    Route::get('unracking_t', 'index')->name('unracking_t');
    Route::get('unracking_t/tambah', 'tambah')->name('unracking_t.tambah');
    Route::post('unracking_t', 'simpan')->name('unracking_t.simpan');
    Route::delete('unracking_t/delete/{id}', 'delete')->name('unracking_t.delete');
    Route::get('unracking_t/{id}/edit', 'edit')->name('unracking_t.edit');
    Route::patch('unracking_t/{id}', 'update')->name('unracking_t.update');
    Route::get('unracking_t/export_excel', 'exportexcel')->name('unracking_t.export');
    Route::get('unracking_t/autocomplete1', 'autocomplete1')->name('autocomplete1_t');
    Route::get('unracking_t/search', 'search')->name('unracking_t.search');
    Route::get('unracking_t/searchdater', 'searchDater')->name('unracking_t.searchdater');
    Route::get('unracking_t/print/{id}', 'unrackingPrint')->name('unracking_t.print');
});

Route::controller(KensaController::class)->middleware(['auth'])->group(function () {
    Route::get('kensa', 'index')->name('kensa');
    Route::get('kensa/tambah', 'tambah')->name('kensa.tambah');
    Route::post('kensa', 'simpan')->name('kensa.simpan');
    Route::delete('kensa/delete/{id}', 'delete')->name('kensa.delete');
    Route::get('kensa/{id}/edit', 'edit')->name('kensa.edit');
    Route::patch('kensa/{id}', 'update')->name('kensa.update');
    Route::get('kensa/export_excel', 'exportexcel')->name('kensa.export');
    Route::get('kensa/autocomplete/{id}', 'autocomplete')->name('autocomplete_t');
    Route::get('kensa/search', 'search')->name('kensa.search');
    Route::get('kensa/searchdater', 'searchDater')->name('kensa.searchDate');
    Route::get('kensa/pengiriman', 'pengiriman')->name('kensa.pengiriman');
    Route::get('kensa/print_kanban', 'printKanban')->name('kensa.printKanban');
    Route::post('kensa/print_kanban/simpan', 'kanbansimpan')->name('kensa.kanban-simpan');
    Route::get('kensa/print_kanban/ajax', 'ajaxKanban')->name('kensa.ajaxKanban');
    Route::get('kensa/ajax', 'ajax')->name('kensa.ajax');
    Route::get('kensa/print_kanban/cetak_kanban/{id}', 'cetak_kanban')->name('kensa.cetak_kanban');
    Route::get('kensa/utama', 'utama')->name('kensa.utama');
});

Route::get('stok', [StokController::class, 'index'])->name('stok');
Route::get('masterkensa', [MasterKensaController::class, 'index'])->name('msterkensa');
Route::get('masterdata/downloadPDF/{id}', [MasterDataController::class, 'downloadPDF'])->name('masterdata.downloadPDF');





require __DIR__ . '/auth.php';
