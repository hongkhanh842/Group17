<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($slug)
    {

        $slug = getStatusByKey($slug);

        return view('admin.order.index',[
            'slug' => $slug,
        ]);
    }

    public function show($id)
    {
        $data = Order::find($id);
        $datalist = OrderDetail::where('order_id', $id)->get();
        $slug = $data->status;
        return view('admin.order.show',[
            'data' => $data,
            'datalist' => $datalist,
            'id' => $id,
            'slug' => $slug,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Order::find($id);
        $data->status = $request->status;
        $data->note = $request->note;
        $data->save();
        $slug = getStatusByValue($data->status);
        return redirect()->route('admin.order.index',['slug' => $slug]);
    }

/*    public function cancelproduct($id)
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

    }*/

    public function destroy($id)
    {
    }
}
