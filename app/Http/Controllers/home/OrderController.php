<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return view('home.order.index',[
            'total' => $request->total,
        ]);
    }

    public function store(Request $request)
    {
        $cardcheck = "True";
        if ($cardcheck == 'True') {

            $data = new Order();
            $data->name = $request->input('name');
            $data->address = $request->input('address');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->total = $request->input('total');
            $data->user_id = Auth::id();
            $data->ip = $_SERVER['REMOTE_ADDR'];
            $data->save();

            $datalist = ShopCart::where('user_id', Auth::id())->get();
            foreach ($datalist as $rs) {
                $data2 = new OrderDetail();
                $data2->user_id = Auth::id();
                $data2->product_id = $rs->product_id;
                $data2->order_id = $data->id;
                $data2->price = $rs->product->price;
                $data2->quantity = $rs->quantity;
                $data2->total = $rs->quantity * $rs->product->price;
                $data2->save();
            }
            $data3 = ShopCart::where('user_id', Auth::id());
            $data3->delete();

            /*return redirect()->route('shopcart.ordercomplete')->with('success', 'Product Orders Success');*/
        }
       /* return redirect()->route('shopcart.ordercomplete')->with('error', 'Your Credit Card is not valid');*/
    }
}
