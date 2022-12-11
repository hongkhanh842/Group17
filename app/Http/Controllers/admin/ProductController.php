<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\product\StoreRequest;
use App\Http\Requests\admin\product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(StoreRequest $request)
    {
        $data = new Product();
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->ram = $request->ram;
        $data->cpu = $request->cpu;
        $data->ssd = $request->ssd;
        $data->use = $request->use;
        if ($request->file('image')) {
            $data->image=$request->file('image')->store('image');
        }
        $data->save();
        return redirect()->route('admin.product.index');
    }

    public function show(Product $product, $id)
    {
        return view('admin.product.show', [
            'id' => $id,
        ]);
    }

    public function edit(Product $product, $id)
    {
        return view('admin.product.edit', [
            'id' => $id,
        ]);
    }


    public function update(UpdateRequest $request, Product $product, $id)
    {
        $data = Product::find($id);
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->ram = $request->ram;
        $data->cpu = $request->cpu;
        $data->ssd = $request->ssd;
        $data->use = $request->use;
        if ($request->file('image')) {
            $data->image=$request->file('image')->store('image');
        }
        $data->save();
        return redirect()->route('admin.product.index');
    }


    public function destroy(Product $product, $id)
    {
        $data = Product::find($id);
        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect()->route('admin.product.index');
    }
}
