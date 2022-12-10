<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('home.product.index');
    }

    public function show()
    {
        return view('home.product.show');
    }
}
