<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('home.user.index');
    }

    public function update(Request $request)
    {
        return view('home.user.index');
    }
    public function orders()
    {
        $data = Order::where('user_id', '=', Auth::id())->get();
        return view('home.user.orders',[
            'data' => $data,
        ]);
    }
}
