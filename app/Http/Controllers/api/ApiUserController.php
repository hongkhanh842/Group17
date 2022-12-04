<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    use ResponseTrait;

    public function full()
    {
        $data = User::query()->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function one($id)
    {
        $data = User::find($id);
        return $this->successResponse($data);
    }

    public function min()
    {
        $data = User::query()->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        return $this->successResponse($arr);
    }
}
