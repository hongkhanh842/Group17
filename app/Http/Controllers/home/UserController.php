<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('home.user.index');
    }

    public function update(Request $request)
    {
        if (!$request->password)
        {
            $request->password = Hash::make($request->password);
        }

        $data = User::find(Auth::id());

        $data->name = $request->name;
        $data->password = $request->password;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->save();
        return redirect()->route('user.index')->with('success','Cập nhật tài khoản thành công');
    }
    public function orders()
    {
        $data = Order::where('user_id', '=', Auth::id())->get();
        return view('home.user.orders',[
            'data' => $data,
        ]);
    }
    public function reviews()
    {
        $comments = Comment::where('user_id', '=', Auth::id())->get();
        return view('home.user.comments',[
            'comments' => $comments,
        ]);
    }
    public function destroy($id)
    {
        $data = Comment::find($id);
        $data->delete();
        return redirect(route('user.reviews'));
    }
}
