<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function product($id)
    {
        $data = Product::find($id);
        $images = DB::table('images')->where('product_id', $id)->get();
        $reviews = Comment::where('product_id', $id)->where('status', 'True')->get();
        if ($data)
        {
            return response()->json([
                'data' => $data,
                'images' => $images,
                'reviews'=> $reviews,
                'statuscode'=> 200,
                'message'=>'OK',
            ]);
        }
        else
        {
            return response()->json([
                'statuscode'=> 404,
                'message'=>'Not Found',
                ]);
        }

    }
}
