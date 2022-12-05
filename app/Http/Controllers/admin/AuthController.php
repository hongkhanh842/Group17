<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\home\Auth\LoggingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function logging(LoggingRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) /*&& isAdmin()===true*/) {
            return redirect()->route("admin.index");
        }
        return redirect()->route("home")->with('error', 'Bạn không có quyền đăng nhập vào trang này');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }
}
