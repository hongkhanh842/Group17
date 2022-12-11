<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('home.cart.index');
    }

    public function add($id)
    {
        $data = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();
        if($data)
        {
            $data->quantity = $data->quantity + 1;
        }else
        {
            $data = new Cart();
            $data->product_id = $id;
            $data->user_id = Auth::id();
            $data->quantity = 1;
        }

        $data->save();

        return redirect()->back()->with('success','Đã thêm vào giỏ hàng');
    }

    public function sub($id)
    {
        $data = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();

        $data->quantity = $data->quantity - 1;

        $data->save();

        return redirect()->back();
    }

    public function plus($id)
    {
        $data = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();

        $data->quantity = $data->quantity + 1;

        $data->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }
}
