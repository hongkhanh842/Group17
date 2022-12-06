<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        if (isShipper()===true || isAdmin()===true || isManager()===true) {
            return view('admin.index');
        }
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
    }
}
