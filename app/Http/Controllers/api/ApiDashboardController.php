<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ApiDashboardController extends Controller
{
    use ResponseTrait;

    public function all()
    {
        $arr['new'] = Order::where('status', 'Mới')->count();
        $arr['accepted'] = Order::where('status', 'Đã xác nhận')->count();
        $arr['shipping'] = Order::where('status', 'Đang giao')->count();
        $arr['shipped'] = Order::where('status', 'Đã giao')->count();
        $arr['cancel'] = Order::where('status', 'Huỷ')->count();
        $arr['users'] = User::where('role','1')->count();
        $arr['categories'] = Category::count();
        $arr['products'] = Product::count();

        return $this->successResponse($arr);
    }
}
