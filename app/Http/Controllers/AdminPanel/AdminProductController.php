<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $data = Category::all();
        return view('admin.product.create', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = new Product();
        $data->category_id = $request->category_id;
        $data->user_id = 0; //$request->category_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->minquantity = $request->minquantity;
        $data->tax = $request->tax;
        $data->status = $request->status;
        if ($request->file('image')) {
            $data->image=$request->file('image')->store('image');
        }
/*        dd($request->except('_token'));
        $data->fill = $request->except('_token');*/
        $data->save();
        return redirect()->route('admin.product.index');
    }

    public function show(Product $product, $id)
    {
        $data = Product::find($id);
        return view('admin.product.show', [
            'data' => $data
        ]);
    }

    public function edit(Product $product, $id)
    {
        $data = Product::find($id);
        $datalist = Category::all();
        return view('admin.product.edit', [
            'data' => $data,
            'datalist' => $datalist
        ]);
    }


    public function update(Request $request, Product $product, $id)
    {
        $data = Product::find($id);
        $data->category_id = $request->category_id;
        $data->user_id = 0; //$request->category_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->minquantity = $request->minquantity;
        $data->tax = $request->tax;
        $data->status = $request->status;
        if ($request->file('image')) {
            $data->image=$request->file('image')->store('image');
        }
        $data->save();
        return redirect('admin/product');
    }


    public function destroy(Product $product, $id)
    {
        $data = Product::find($id);
        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::delete($data->image);
        }
        $data->delete();
        /*$product->delete();*/
        return redirect('admin/product');
    }
}
