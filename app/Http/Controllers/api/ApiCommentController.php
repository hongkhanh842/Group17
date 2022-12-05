<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Comment;
use Illuminate\Http\Request;

class ApiCommentController extends Controller
{
    use ResponseTrait;
    public function full()
    {
        $data = Comment::query()->with('product')->with('user')->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }

    public function one($id)
    {
        $data = Comment::find($id);
        return $this->successResponse($data);
    }

    public function min()
    {
        $data = Comment::query()->with('product')->with('user')->latest()->paginate(5);

        $arr['data'] = $data->getCollection();
        return $this->successResponse($arr);
    }
}
