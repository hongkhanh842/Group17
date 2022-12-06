<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index($pid)
    {
        $product = Product::find($pid);
        $images = DB::table('images')->where('product_id', $pid)->get();

        return view('admin.image.index', [
            'product' => $product,
            'images' => $images,
        ]);
    }
    public function store(Request $request, $pid)
    {
        $data = new Image();
        $data->product_id = $pid;
        $data->name = $request->name;
        if ($request->file('image')){
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect()->route('admin.image.index', ['pid' => $pid]);
    }

    public function destroy($pid, $id)
    {
        $data = Image::find($id);
        if ($data->image && Storage::disk('public')->exists($data->image)){
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect()->route('admin.image.index', ['pid' => $pid]);
    }
}
