<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show(Category $category, $id)
    {
        $data = Category::find($id);
        $products = DB::table('products')->where('category_id', $id)->paginate(6);
        return view('home.category.show',[
            'category' => $data,
            'products' => $products,
            'id' => $id,
        ]);
    }
}
