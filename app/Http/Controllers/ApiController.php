<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    use ResponseTrait;
    //
    public function product($id)
    {
        $data = Product::find($id);
        $images = DB::table('images')->where('product_id', $id)->get();
        $reviews = Comment::where('product_id', $id)->where('status', 'True')->get();

       /* return response()->json([
            'data' => $data,
            'images' => $images,
            'reviews' => $reviews,
            'statuscode' => 200,
            'message' => 'OK',
        ]);*/

    }

    public function category(): JsonResponse
    {
        $data = Category::query()->latest()->paginate(5);
        /*return response()->json([
                'success' => true,
                'data' => $data->getCollection(),
                'pagination'=> $data->linkCollection(),
        ]);*/

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return $this->successResponse($arr);
    }
}
