<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($email)
    {
        Mail::to($email)->send(new MailNotify());
        return redirect()->route('home')->with('success', 'Đăng ký thành công, kiểm tra thư của bạn');
    }
}
