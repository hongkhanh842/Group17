<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($slug)
    {
        $data = Order::where('status', $slug)->get();
        return view('admin.order.index',[
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = Order::find($id);
        $datalist = OrderProduct::where('order_id', $id)->get();
        return view('admin.order.show',[
            'data' => $data,
            'datalist' => $datalist,
            'id' => $id,
            ]);
    }

    public function update(Request $request, $id)
    {
        $data = Order::find($id);
        $data->status = $request->status;
        $data->note = $request->note;
        $data->save();

        return redirect()->route('admin.order.show',['id' => $id]);
    }

    public function cancelorder($id)
    {
        $data = Order::find($id);
        $data->status = 'Cancelled';
        $data->save();

        return redirect()->back();

    }

    public function cancelproduct($id)
    {
        $data = OrderProduct::find($id);
        $data->status = 'Cancelled';
        $data->save();

        return redirect()->back();

    }

    public function acceptproduct($id)
    {
        $data = OrderProduct::find($id);
        $data->status = 'Accepted';
        $data->save();

        return redirect()->back();

    }

    public function destroy($id)
    {
        //
    }
}
