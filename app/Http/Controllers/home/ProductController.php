<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $reviews = Comment::where('product_id',$id)->where('status','Hiển thị')->get();
        $images = DB::table('images')->where('product_id', $id)->get();
        return view('home.product.show', [
            'id' => $id,
            'data' => $data,
            'reviews' => $reviews,
            'images' => $images,
        ]);
    }
}
