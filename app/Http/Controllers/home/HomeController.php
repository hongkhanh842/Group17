<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public static function index(Request $request)
    {
        if ($request->session()->has('cart') && Auth()->check()) {
            foreach(Session::get('cart') as $each)
            {
                $data = Cart::where('product_id', $each)->where('user_id', Auth::id())->first();
                if($data)
                {
                    $data->quantity = $data->quantity + 1;
                }else
                {
                    $data = new Cart();
                    $data->product_id = $each;
                    $data->user_id = Auth::id();
                    $data->quantity = 1;
                }

                $data->save();
                session()->forget(['cart']);
            }
        };
        return view('home.index');
    }
}
