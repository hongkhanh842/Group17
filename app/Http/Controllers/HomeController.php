<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public static function maincategorylist()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public function index()
    {
        $page='home';
        $sliderdata = Product::limit(4)->get();
        $productlist1 = Product::limit(6)->get();
        $setting=Setting::first();
        return view('home.index',[
            'page' => $page,
            'setting' => $setting,
            'sliderdata' => $sliderdata,
            'productlist1' => $productlist1,
        ]);
    }

    public function about()
    {
        $setting=Setting::first();
        return view('home.about',[
            'setting' => $setting,
        ]);
    }

    public function contact()
    {
        $setting=Setting::first();
        return view('home.contact',[
            'setting' => $setting,

        ]);
    }

    public function faq()
    {
        $setting=Setting::first();
        $datalist=Faq::all();
        return view('home.faq',[
            'setting' => $setting,
            'datalist' => $datalist,
        ]);
    }

    public function storemessage(Request $request)
    {
        $data=new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = request()->ip();
        $data->save();

        return redirect()->route('contact')->with('info','Your Message has been sent, thank you');
    }

    public function storecomment(Request $request)
    {
        $data = new Comment();
        $data->user_id = Auth::id();
        $data->product_id = $request->input('product_id');
        $data->subject = $request->input('subject');
        $data->review = $request->input('review');
        $data->rate = $request->input('rate');
        $data->ip = request()->ip();
        $data->save();

        return redirect()->route('product',['id'=>$data->product_id])->with('success','Your Comment has been sent, thank you');
    }

    public function references()
    {
        $setting=Setting::first();
        return view('home.references',[
            'setting' => $setting,

        ]);
    }

    public function product($id)
    {
        $data = Product::find($id);
        $images = DB::table('images')->where('product_id', $id)->get();
        $reviews = Comment::where('product_id',$id)->where('status','True')->get();
        return view('home.product',[
            'data' => $data,
            'images' => $images,
            'reviews'=> $reviews,
        ]);
    }

    public function categoryproducts($id)
    {
        $data = Product::find($id);
        $images = DB::table('images')->where('product_id', $id)->get();
        return view('home.product',[
            'data' => $data,
            'images' => $images,
        ]);
    }


}
