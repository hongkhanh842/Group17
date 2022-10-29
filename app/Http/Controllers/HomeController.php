<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $page='home';
        $sliderdata = Product::limit(4)->get();
        $productlist1 = Product::limit(6)->get();
        return view('home.index',[
            'page' => $page,
            'sliderdata' => $sliderdata,
            'productlist1' => $productlist1,
        ]);
    }

    public function product($id)
    {
        $data = Product::find($id);
        $images = DB::table('images')->where('product_id', $id)->get();
        return view('home.product',[
            'data' => $data,
            'images' => $images,
        ]);
    }
}
