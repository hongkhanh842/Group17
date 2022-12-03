<?php

namespace App\Http\Controllers\home;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\home\Auth\LoggingRequest;
use App\Http\Requests\home\Auth\RegisteringRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('home.auth.login');
    }

    public function logging(LoggingRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route("home");
        }
        return redirect()->route("login")->with('error', 'Email hoặc mật khẩu không đúng');
    }

    public function register()
    {
        return view('home.auth.register');
    }

    public function registering(RegisteringRequest $request)
    {
        $password = Hash::make($request->password);
        if (auth()->check()) {
            User::where('id', auth()->user()->id)
                ->update([
                    'password' => $password,
                ]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $request->avatar,
                'password' => $password,
            ]);
            Auth::login($user);
        }
        return redirect()->route("home");
    }

    public function callback($provider)
    {
        $data = Socialite::driver($provider)->user();

        $user = User::query()->where('email', $data->getEmail())->first();

        $checkExists = true;

        if (is_null($user)) {
            $user = new User();
            $user->email = $data->getEmail();
            $checkExists = false;
        }
        $user->name = $data->getName();
        $user->avatar = $data->getAvatar();
        $user->save();

        Auth::login($user);

        if($checkExists){
            return redirect()->route("home");
        }
        return redirect()->route('register');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
