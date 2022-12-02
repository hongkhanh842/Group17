<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    use ResponseTrait;

    public function full()
    {
        $data = Category::query()->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function one($id)
    {
        $data = Category::find($id);
        return $this->successResponse($data);
    }

    public function min()
    {
        $data = Category::query()->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        return $this->successResponse($arr);
    }
}
