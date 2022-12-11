<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }

    public function show($id)
    {
        return view('admin.order.show',[
            'id' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Order::find($id);
        $data->status = $request->status;
        $data->note = $request->note;
        $data->save();
        return redirect()->route('admin.order.index')->with('success','Cập nhật trọng thái đơn hàng thành công');
    }
}
