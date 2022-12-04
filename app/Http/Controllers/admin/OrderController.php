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
        $slug = Order::find($id)->status;

        return view('admin.order.show',[
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

    public function destroy($id)
    {
    }
}
