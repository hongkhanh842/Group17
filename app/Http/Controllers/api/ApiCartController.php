<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiCartController extends Controller
{
    use ResponseTrait;

    public function count()
    {
        $data = Cart::where('user_id', Auth::id())->count();
        return $this->successResponse($data);
    }

    public function full()
    {
        $data = Cart::with('product')->get();
        return $this->successResponse($data);
    }
}
