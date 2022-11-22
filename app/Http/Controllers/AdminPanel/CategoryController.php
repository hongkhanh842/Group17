<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPanel\Category\StoreRequest;
use App\Http\Requests\AdminPanel\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        $data = new Category();
        $data->parent_id = $request->parent_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->status = $request->status;
        if ($request->file('image')) {
            $data->image=$request->file('image')->store('image');
        }
        $data->save();
        return redirect()->route('admin.category.index');
    }

    public function show(Category $category, $id)
    {
        return view('admin.category.show', [
            'id' => $id,
        ]);
    }

    public function edit(Category $category, $id)
    {
        return view('admin.category.edit', [
            'id' => $id
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = Category::find($id);
        $data->parent_id = $request->parent_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->status = $request->status;
        if ($request->file('image')) {
            $data->image=$request->file('image')->store('image');
        }
        $data->save();
        return redirect('admin/category');
    }


    public function destroy(Category $category, $id)
    {
        $data = Category::find($id);
        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect('admin/category');
    }
}
