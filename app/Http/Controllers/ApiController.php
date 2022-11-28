<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Message;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    use ResponseTrait;

    public function category(): JsonResponse
    {
        $data = Category::query()->latest()->paginate(10);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function comment(): JsonResponse
    {
        $data = Comment::query()->with('product')->with('user')->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function product(): JsonResponse
    {
        $data = Product::query()->with('category')->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function faq(): JsonResponse
    {
        $data = Faq::query()->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function message(): JsonResponse
    {
        $data = Message::query()->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function order(): JsonResponse
    {
        $data = Order::query()->with('user')->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function orderproduct(): JsonResponse
    {
        $data = OrderProduct::query()->with('product')->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function ajaxSearch()
    {
        $data = Product::search()->limit(5)->get();
        return $this->successResponse($data);
    }

/*    public function image(): JsonResponse
    {
        $data = Image::query()->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }*/


}
