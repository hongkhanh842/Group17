<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\home\order\StoreRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($total = null)
    {
        if (Auth::check())
        {
            return view('home.order.index',[
                'total' => $total,
            ]);
        }
       return redirect()->back()->with('error','Bạn phải đăng nhập để tiếp tục');
    }

    public function store(StoreRequest $request)
    {
        $cardcheck = "True";
        if ($cardcheck == 'True') {

            $data = new Order();
            $data->name = $request->input('name');
            $data->address = $request->input('address');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->total = 0;
            $data->status = "Chờ xác nhận";
            $data->user_id = Auth::id();
            $data->save();

            $datalist = Cart::where('user_id', Auth::id())->get();
            foreach ($datalist as $rs) {
                $data2 = new OrderDetail();
                $data2->user_id = Auth::id();
                $data2->product_id = $rs->product_id;
                $data2->order_id = $data->id;
                $data2->price = $rs->product->price;
                $data2->quantity = $rs->quantity;
                $data2->total = $rs->quantity * $rs->product->price;
                $data->total += $data2->total;
                $data2->save();
                $product = Product::find($data2->product_id);
                $product->quantity = $product->quantity - $data2->quantity;
                $product->save();
            }

            $data->save();

            $data3 = Cart::where('user_id', Auth::id());
            $data3->delete();

            return redirect()->route('user.orders')->with('success', 'Đặt hàng thành công');
        }
        return redirect()->route('user.orders')->with('error', 'Đặt hàng thất bại');
    }

    public function update($id)
    {
        $order = Order::find($id);
        if ($order->status === "Chờ xác nhận")
        {
            $order->status = "Huỷ";
            $order->save();
            return redirect()->route('user.orders')->with('success','Huỷ đơn hàng thành công');
        }
        return redirect()->route('user.orders')->with('error','Bạn không thể huỷ đơn hàng này');
    }

    public function show($id)
    {
        return view('home.order.show',[
            'id' => $id,
        ]);
    }
}
