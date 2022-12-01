<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\Auth\RegisteringRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
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

        $role = getRoleByKey($user->role);
        Auth::login($user);


        if($checkExists){
            return redirect()->route("$role.welcome");
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
