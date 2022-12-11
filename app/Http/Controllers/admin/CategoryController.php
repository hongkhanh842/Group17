<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\category\StoreRequest;
use App\Http\Requests\admin\category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $data->name = $request->name;
        if ($request->file('image')) {
            $data->image=$request->file('image')->store('image');
        }
        $data->save();

        return redirect()->route('admin.category.index')->with('success','Thêm danh mục thành công');
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
        $data->name = $request->name;
        if ($request->file('image')) {
            $data->image=$request->file('image')->store('image');
        }
        $data->save();

        return redirect()->route('admin.category.index')->with('success','Cập nhật danh mục thành công');
    }


    public function destroy(Category $category, $id)
    {
        $data = Category::find($id);

        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::delete($data->image);
        }
        $data->delete();

        return redirect()->route('admin.category.index')->with('error','Đã xoá danh mục');
    }
}
