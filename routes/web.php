<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\home\AuthController;
use App\Http\Controllers\home\CartController;
use App\Http\Controllers\home\CategoryController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\home\OrderController;
use App\Http\Controllers\home\ProductController;
use App\Http\Controllers\home\UserController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

//SOCIALITE ROUTES
Route::get('/auth/redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
})->name('auth.redirect');

Route::get('/auth/callback/{provider}', [AuthController::class, 'callback'])->name('auth.callback');
//___

//AUTH ROUTES
Route::post('/login', [AuthController::class, 'logging'])->name('logging');

Route::post('/register', [AuthController::class, 'registering'])->name('registering');
Route::get('/mail/{email}', [MailController::class, 'index'])->name('mail');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/login', [\App\Http\Controllers\admin\AuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\admin\AuthController::class, 'logging'])->name('admin.logging');
//___

//HOME ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('product')
    ->controller(ProductController::class)->name('product.')
    ->group(function () {
        Route::get('/{cate_id?}', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
    });

/*Route::middleware('auth')->group(function () {*/
    Route::prefix('cart')->controller(CartController::class)->name('cart.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/add/{id}', 'add')->name('add');
            Route::post('/store/{id}', 'store')->name('store');
            Route::get('/sub/{id}', 'sub')->name('sub');
            Route::get('/plus/{id}', 'plus')->name('plus');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

    Route::prefix('order')->controller(OrderController::class)->name('order.')
        ->group(function () {
            Route::get('/{total?}', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/update/{id}', 'update')->name('update');
        });

    Route::prefix('user')->prefix('user')->controller(UserController::class)->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update', 'update')->name('update');
        Route::get('/orders', 'orders')->name('orders');
    });
/*});*/
//___
