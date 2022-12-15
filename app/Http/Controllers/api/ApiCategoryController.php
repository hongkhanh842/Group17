<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiCategoryController extends Controller
{
    use ResponseTrait;

    public function full()
    {
        $data = Category::query()->latest()->paginate(5);
        $parent = Category::select('id','name')->where('parent_id', '=', 0)->get();
        $arr['data'] = $data->getCollection();
        $arr['parent_data'] = $parent;
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function one($id)
    {
        $data = Category::with('parent')->find($id);
        return $this->successResponse($data);
    }

    public function min()
    {
        $data = Category::query()->select('id','name','parent_id')->get();

        $arr['data'] = $data;
        return $this->successResponse($arr);
    }

    public function product()
    {
        $data = Category::query()->select('id','name')
            ->where('parent_id', '!=' , 0)->get();

        $arr['data'] = $data;
        return $this->successResponse($arr);
    }

    public function edit()
    {
        $data = Category::query()->get();

        $arr['data'] = $data;
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
    public function ajaxSearch($id)
    {
        $data = Product::search()->where('category_id',$id)->limit(5)->get();
        return $this->successResponse($data);
    }

    public function data()
    {
        $data =  Category::select('id','name','image')->where('parent_id', '=', 0)->with('children')->get();
        return $this->successResponse($data);
    }
}
