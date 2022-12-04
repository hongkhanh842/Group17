<?php

use App\Http\Controllers\api\ApiCategoryController;
use App\Http\Controllers\api\ApiDashboardController;
use App\Http\Controllers\api\ApiOrderController;
use App\Http\Controllers\api\ApiOrderDetailController;
use App\Http\Controllers\api\ApiProductController;
use App\Http\Controllers\api\ApiUserController;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('category')->controller(ApiCategoryController::class)->name('api.category.')
    ->group(function () {
        Route::get('/full', 'full')->name('full');
        Route::get('/min', 'min')->name('min');
        Route::get('/one/{id}', 'one')->name('one');
        Route::get('/show/{id}', 'show')->name('show');
    });

Route::prefix('product')->controller(ApiProductController::class)->name('api.product.')
    ->group(function () {
        Route::get('/full', 'full')->name('full');
        Route::get('/min', 'min')->name('min');
        Route::get('/one/{id}', 'one')->name('one');
        Route::get('/search','ajaxSearch')->name('search');
    });

Route::prefix('user')
    ->middleware('manager')
    ->controller(ApiUserController::class)->name('api.user.')
    ->group(function () {
        Route::get('/full', 'full')->name('full');
        Route::get('/min', 'min')->name('min');
        Route::get('/one/{id}', 'one')->name('one');
    });

Route::prefix('orderdetail')->controller(ApiOrderDetailController::class)->name('api.orderdetail.')
    ->group(function () {
        Route::get('/min', 'min')->name('min');
    });

Route::prefix('order')->controller(ApiOrderController::class)->name('api.order.')
    ->group(function () {
        Route::get('/one/{id}', 'one')->name('one');
        Route::get('/slug/{slug}', 'slug')->name('slug');
    });

Route::prefix('dashboard')->controller(ApiDashboardController::class)->name('api.dashboard.')
    ->group(function () {
        Route::get('/all', 'all')->name('all');
    });
