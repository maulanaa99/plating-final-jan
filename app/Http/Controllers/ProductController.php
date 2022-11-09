<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    // Show View Product
    public function index()
    {
        $product = Product::all();
        return view('product', compact('product'));
    }
    public function getDataProduct()
    {
        $product = Product::all();
        return DataTables::of($product)
        ->addIndexColumn()
        ->make(true);
    }
}
