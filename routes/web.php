<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\home\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//AUTH ROUTES
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'logging'])->name('logging');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registering'])->name('registering');

Route::get('/auth/redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
})->name('auth.redirect');

Route::get('/auth/callback/{provider}', [AuthController::class, 'callback'])->name('auth.callback');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/login', [\App\Http\Controllers\admin\AuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\admin\AuthController::class, 'logging'])->name('admin.logging');
//___
