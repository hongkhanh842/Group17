<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiOrderController extends Controller
{
    use ResponseTrait;

    public function one($id)
    {
        $data = Order::with('user')->find($id);
        return $this->successResponse($data);
    }

    public function full()
    {
        $data = Order::with('user')->latest()->paginate(5);
        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function slug($slug)
    {
        $data = Order::with('user')->where('status', $slug)->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function show($id)
    {
        $data = Order::find($id);
        $product = OrderDetail::where('order_id', '=', $id)->with('product')->get();

        $arr['data'] = $data;
        $arr['product'] = $product;
        return $this->successResponse($arr);
    }
}
