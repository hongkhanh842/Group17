<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\home\AuthController;
use App\Http\Controllers\home\CategoryController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\home\OrderController;
use App\Http\Controllers\home\ProductController;
use App\Http\Controllers\home\ShopCartController;
use App\Http\Controllers\home\UserController;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/send',function (){Mail::to('1851120019@sv.ut.edu.vn')->send(new MailNotify());});
//___

//HOME ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('product')
    ->controller(ProductController::class)->name('product.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
    });

Route::prefix('category')
    ->controller(CategoryController::class)->name('category.')
    ->group(function () {
        Route::get('/show/{id}', 'show')->name('show');
    });

Route::middleware('auth')->group(function () {
    Route::prefix('shopcart')->controller(ShopCartController::class)->name('shopcart.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/add/{id}', 'add')->name('add');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
            Route::get('/show/{id}', 'show')->name('show');
            /* Route::post('/order', 'order')->name('order');
             Route::post('/storeorder', 'storeorder')->name('storeorder');
             Route::get('/ordercomplete', 'ordercomplete')->name('ordercomplete');*/
        });

    Route::prefix('order')->controller(OrderController::class)->name('order.')
        ->group(function () {
            Route::post('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/update/{id}', 'update')->name('update');
            Route::get('/cancel/{id}', 'cancel')->name('cancel');
        });

    Route::prefix('user')->prefix('user')->controller(UserController::class)->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update', 'update')->name('update');
        /*Route::get('/reviews', 'reviews')->name('reviews');
        Route::get('/reviewdestroy/{id}', 'reviewdestroy')->name('reviewdestroy');*/
        Route::get('/orders', 'orders')->name('orders');
        /*Route::get('/orderdetail/{id}', 'orderdetail')->name('orderdetail');*/
        /*Route::get('/cancelproduct/{id}', 'cancelproduct')->name('cancelproduct');*/
    });
});

