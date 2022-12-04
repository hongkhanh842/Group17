<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function show($id)
    {
        $arr['data'] = Category::find($id);
        $product = DB::table('products')->where('category_id', $id)->paginate(6);
        $arr['product'] = $product->getCollection();
        $arr['pagination'] = $product->linkCollection();

        return $this->successResponse($arr);
    }
}
