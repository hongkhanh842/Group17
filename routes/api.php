<?php

use App\Http\Controllers\api\ApiCartController;
use App\Http\Controllers\api\ApiCategoryController;
use App\Http\Controllers\api\ApiDashboardController;
use App\Http\Controllers\api\ApiImageController;
use App\Http\Controllers\api\ApiOrderController;
use App\Http\Controllers\api\ApiOrderDetailController;
use App\Http\Controllers\api\ApiProductController;
use App\Http\Controllers\api\ApiSessionController;
use App\Http\Controllers\api\ApiUserController;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('category')->controller(ApiCategoryController::class)->name('api.category.')
    ->group(function () {
        Route::get('/full', 'full')->name('full');
        Route::get('/min', 'min')->name('min');
        Route::get('/product', 'product')->name('product');
        Route::get('/edit', 'edit')->name('edit');
        Route::get('/one/{id}', 'one')->name('one');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/search/{id}', 'ajaxSearch')->name('search');
        Route::get('/data', 'data')->name('data');
    });

Route::prefix('product')->controller(ApiProductController::class)->name('api.product.')
    ->group(function () {
        Route::get('/full', 'full')->name('full');
        Route::get('/full1', 'full1')->name('full1');
        Route::get('/min', 'min')->name('min');
        Route::get('/one/{id}', 'one')->name('one');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/search1', 'ajaxSearch')->name('search1');
        Route::get('/search2', 'ajaxSearchAll')->name('search2');

    });

Route::prefix('image')->controller(ApiImageController::class)->name('api.image.')
    ->group(function () {
        Route::get('/{id}', 'full')->name('full');
    });

Route::prefix('user')
    ->controller(ApiUserController::class)->name('api.user.')
    ->group(function () {
        Route::get('/full', 'full')->name('full');
        Route::get('/min', 'min')->name('min');
        Route::get('/info', 'info')->name('info');
        Route::get('/one/{id}', 'one')->name('one');
        Route::get('/orders', 'orders')->name('orders');
    });

Route::prefix('orderdetail')->controller(ApiOrderDetailController::class)->name('api.orderdetail.')
    ->group(function () {
        Route::get('/min', 'min')->name('min');
    });

Route::prefix('order')->controller(ApiOrderController::class)->name('api.order.')
    ->group(function () {
        Route::get('/one/{id}', 'one')->name('one');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/full', 'full')->name('full');
        Route::get('/slug/{slug}', 'slug')->name('slug');
    });

Route::prefix('cart')->controller(ApiCartController::class)->name('api.cart.')
    ->group(function () {
        Route::get('/count', 'count')->name('count');
        Route::get('/', 'full')->name('full');
    });

Route::prefix('dashboard')->controller(ApiDashboardController::class)->name('api.dashboard.')
    ->group(function () {
        Route::get('/', 'all')->name('all');
        Route::get('/home', 'index')->name('index');
    });

Route::prefix('session')->controller(ApiSessionController::class)->name('api.session.')
    ->group(function () {
        Route::get('/', 'all')->name('all');
    });
