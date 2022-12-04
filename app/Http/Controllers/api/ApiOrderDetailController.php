<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class ApiOrderDetailController extends Controller
{
    use ResponseTrait;

    public function min()
    {
        $data = OrderDetail::query()->with('product')->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        return $this->successResponse($arr);
    }
}
