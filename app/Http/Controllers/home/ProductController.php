<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($cate_id = null)
    {
            return view('home.product.index',[
                'cate_id' => $cate_id,
            ]);
    }

    public function show($id)
    {
        return view('home.product.show',[
            'id' => $id,
        ]);
    }
}
