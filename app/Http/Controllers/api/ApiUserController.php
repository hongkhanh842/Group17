<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    use ResponseTrait;

    public function full()
    {
        $data = User::query()->where('role','!=',0)->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function one($id)
    {
        $data = User::find($id);
        return $this->successResponse($data);
    }

    public function info()
    {
        $data = User::find(Auth::user()->id);
        return $this->successResponse($data);
    }

    public function min()
    {
        $data = User::query()->where('role','!=',0)->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        return $this->successResponse($arr);
    }
    public function orders()
    {
        $data = Order::where('user_id', '=', Auth::id())->paginate(5);
        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }
}
