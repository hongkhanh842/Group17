<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (isShipper()===true || isAdmin()===true || isManager()===true) {
            return view('admin.index');
        }
        return redirect()->route("admin.login");
    }
}
