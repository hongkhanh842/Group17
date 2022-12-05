<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static function maincategorylist()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public static function index()
    {
        $page='home';
        $sliderdata = Product::limit(4)->get();
        /*$sliderdata1 = Product::avarage(5)->limit(4)->get();
        dd($sliderdata1);*/
        $productlist1 = Product::limit(6)->get();
        /*$setting=Setting::first();*/
        return view('home.index',[
            'page' => $page,
            /*'setting' => $setting,*/
            'sliderdata' => $sliderdata,
            'productlist1' => $productlist1,
        ]);
    }

}
