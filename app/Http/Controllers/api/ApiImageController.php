<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiImageController extends Controller
{
    use ResponseTrait;

    public function full($id)
    {
        $images = DB::table('images')->where('product_id', $id)->get();
        return $this->successResponse($images);
    }
}
