<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Models\Product;
use App\Models\Supply;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // Show View Product
    public function viewProduct()
    {
        $products = Product::all()
            ->sortBy('kode_barang');

        return view('product.product', compact('products'));
    }

    // Show View New Product
    public function viewNewProduct()
    {
        return view('product.newproduct');
    }

    // Filter Product Table
    public function filterTable($id)
    {
        $products = Product::orderBy($id, 'asc')
            ->get();

        return view('product.filter-product', compact('products'));
    }

    // Create New Product
    public function createProduct(Request $req)
    {
        $check_product = Product::where('kode_barang', $req->kode_barang)
            ->count();

        if ($check_product == 0) {
            $product = new Product;
            $product->kode_barang = $req->kode_barang;
            $product->jenis_barang = $req->jenis_barang;
            $product->nama_barang = $req->nama_barang;
            $product->berat_barang = $req->berat_barang;
            $product->merek = $req->merek;
            $product->stok = $req->stok;
            $product->harga = $req->harga;
            $product->save();

            Session::flash('create_success', 'Barang baru berhasil ditambahkan');

            return redirect('/product');
        } else {
            Session::flash('create_failed', 'Kode barang telah digunakan');

            return back();
        }
    }

    // Import New Product
    public function importProduct(Request $req)
    {

        $file = $req->file('excel_file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('excel_file', $nama_file);
        Excel::import(new ProductImport, public_path('/excel_file/' . $nama_file));

        Session::flash('import_success', 'Data barang berhasil diimport');
        return redirect('/product');
    }


    // Edit Product
    public function editProduct($id)
    {
        $product = Product::find($id);

        return response()->json(['product' => $product]);
    }

    // Update Product
    public function updateProduct(Request $req)
    {
            $check_product = Product::where('kode_barang', $req->kode_barang)
                ->count();
            $product_data = Product::find($req->id);
            if ($check_product == 0 || $product_data->kode_barang == $req->kode_barang) {
                $product = Product::find($req->id);
                $kode_barang = $product->kode_barang;
                $product->kode_barang = $req->kode_barang;
                $product->jenis_barang = $req->jenis_barang;
                $product->nama_barang = $req->nama_barang;
                $product->berat_barang = $req->berat_barang;
                $product->merek = $req->merek;
                $product->stok = $req->stok;
                $product->harga = $req->harga;
                if ($req->stok <= 0) {
                    $product->keterangan = "Habis";
                } else {
                    $product->keterangan = "Tersedia";
                }
                $product->save();

                Supply::where('kode_barang', $kode_barang)
                    ->update(['kode_barang' => $req->kode_barang]);

                Session::flash('update_success', 'Data barang berhasil diubah');

                return redirect('/product');
            } else {
                Session::flash('update_failed', 'Kode barang telah digunakan');

                return back();
            }
        } 

    // Delete Product
    public function deleteProduct($id)
    {
        
            Product::destroy($id);

            Session::flash('delete_success', 'Barang berhasil dihapus');

            return back();
        } 
}
