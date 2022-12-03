<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('home.product.index',[
            'products' => $products,
        ]);
    }

    public function show(Product $category, $id)
    {
        $data = Product::find($id);
        return view('home.product.show', [
            'id' => $id,
            'data' => $data,
        ]);
    }
}
