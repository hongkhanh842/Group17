<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\home\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        Auth::logout();

        return view('admin.auth.login');
    }

    public function logging(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route("admin.index");
        }
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }
}
