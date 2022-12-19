<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
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

    public function orders()
    {
        return view('home.user.orders');
    }

    public function update(Request $request)
    {
        if (!$request->password)
        {
            $request->password = Hash::make($request->password);
        }
        $data = User::find(Auth::id());
        $data->name = $request->name;
        if ($request->file('avatar')) {
            $data->avatar=$request->file('avatar')->store('avatar');
        }
        $data->password = $request->password;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->save();

        /*Auth::logout();
        $request->session()->invalidate();

        Auth::login($data);
        $request->session()->regenerate();*/

        return redirect()->route('user.index')->with('success','Cập nhật tài khoản thành công');
    }
}
