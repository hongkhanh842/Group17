<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Order;
use Illuminate\Http\Request;

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
}
