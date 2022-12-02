<?php

namespace App\Http\Controllers\admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.user.index',[
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $password = Hash::make($request->password);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $password;
        $data->address = $request->address;
        $data->role = $request->role;
        if ($request->file('avatar')) {
            $data->avatar=$request->file('avatar')->store('image');
        }
        $data->save();

        return redirect()->route('admin.user.index');
    }

    public function show(User $user, $id)
    {
        $data = User::find($id);
        return view('admin.user.show', [
            'id' => $id,
            'data' => $data,
        ]);
    }

    public function edit(User $user, $id)
    {
        return view('admin.user.edit', [
            'id' => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        $password = Hash::make($request->password);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $password;
        $data->address = $request->address;
        $data->role = $request->role;
        if ($request->file('avatar')) {
            $data->avatar=$request->file('avatar')->store('image');
        }
        $data->save();
        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user, $id)
    {
        $data = User::find($id);

        if ($data->avatar && Storage::disk('public')->exists($data->avatar)) {
            Storage::delete($data->avatar);
        }
        $data->delete();

        return redirect()->route('admin.user.index');
    }
}
