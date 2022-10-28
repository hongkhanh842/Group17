<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliderdata = Product::limit(4)->get();
        /*dd($sliderdata);*/
        return view('home.index',[
            'sliderdata' => $sliderdata,
        ]);
    }
}
