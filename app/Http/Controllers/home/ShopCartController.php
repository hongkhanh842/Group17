<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopCartController extends Controller
{
    public static function countshopcart()
    {
        return ShopCart::where('user_id', Auth::id())->count();
    }

    public function index()
    {
        $data = ShopCart::where('user_id', Auth::id())->get();
        return view('home.shopcart.index',[
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $data = ShopCart::where('product_id', $id)->where('user_id', Auth::id())->first();
        if($data)
        {
            $data->quantity = $data->quantity + $request->input('quantity');
        }else
        {
            $data = new ShopCart;
            $data->product_id = $id;
            $data->user_id = Auth::id();
            $data->quantity = $request->input('quantity');
        }
        $data->save();

        return redirect()->back()->with('success','Đã thêm vào giỏ hàng');
    }

    public function add($id)
    {
        $data = ShopCart::where('product_id', $id)->where('user_id', Auth::id())->first();
        if($data)
        {
            $data->quantity = $data->quantity + 1;
        }else
        {
            $data = new ShopCart;
            $data->product_id = $id;
            $data->user_id = Auth::id();
            $data->quantity = 1;
        }

        $data->save();

        return redirect()->back()->with('success','Đã thêm vào giỏ hàng');
    }

    public function update(Request $request, $id)
    {
        $data = ShopCart::find($id);
        $data->quantity = $request->input('quantity');
        $data->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = ShopCart::find($id);
        $data->delete();
        return redirect()->back();
    }
}
