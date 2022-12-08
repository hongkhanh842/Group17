<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    use ResponseTrait;

    public function full()
    {
        $data = Product::query()->with('category')->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function one($id)
    {
        $data = Product::with('category')->find($id);
        $data->ram = getRamByKey($data->ram);
        $data->cpu = getCPUByKey($data->cpu);
        $data->ssd = getSSDByKey($data->ssd);
        $data->use = getUseByKey($data->use);
        /*$data->price = number_format($data->price);*/
        return $this->successResponse($data);
    }

    public function edit($id)
    {
        $data = Product::with('category')->find($id);

        return $this->successResponse($data);
    }

    public function min()
    {
        $data = Product::query()->with('category')->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        return $this->successResponse($arr);
    }

    public function ajaxSearch()
    {
        $data = Product::query()->search()->limit(5)->get();
        return $this->successResponse($data);
    }

}
