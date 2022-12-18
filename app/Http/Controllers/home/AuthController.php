<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\home\Auth\LoginRequest;
use App\Http\Requests\home\Auth\RegisterRequest;
use App\Mail\MailNotify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function logging(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        /*dd(Auth::attempt($credentials));*/
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("home");
        }
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
    }

    public function registering(RegisterRequest $request)
    {
        $password = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);
        Auth::login($user);
        Mail::to($request->email)->send(new MailNotify());
        return redirect()->route('home')->with('success', 'Đăng ký thành công, kiểm tra email của bạn');
    }

    public function callback($provider)
    {
        $data = Socialite::driver($provider)->user();

        $user = User::query()->where('email', $data->getEmail())->first();

        if (is_null($user)) {
            $user = new User();
            $user->email = $data->getEmail();
        }
        $user->name = $data->getName();
        $user->save();

        Auth::login($user);
        return redirect()->route("home");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('home');
    }
}
