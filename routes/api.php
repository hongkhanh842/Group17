<?php

use App\Http\Controllers\api\ApiCategoryController;
use App\Http\Controllers\api\ApiOrderController;
use App\Http\Controllers\api\ApiProductController;
use App\Http\Controllers\api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('category')->controller(ApiCategoryController::class)->name('api.category.')
    ->group(function () {
        Route::get('/full', 'full')->name('full');
        Route::get('/min', 'min')->name('min');
        Route::get('/one/{id}', 'one')->name('one');
    });

Route::prefix('product')->controller(ApiProductController::class)->name('api.product.')
    ->group(function () {
        Route::get('/full', 'full')->name('full');
        Route::get('/min', 'min')->name('min');
        Route::get('/one/{id}', 'one')->name('one');
    });

Route::prefix('user')->controller(ApiUserController::class)->name('api.user.')
    ->group(function () {
        Route::get('/full', 'full')->name('full');
        Route::get('/min', 'min')->name('min');
        Route::get('/one/{id}', 'one')->name('one');
    });

Route::prefix('order')->controller(ApiOrderController::class)->name('api.order.')
    ->group(function () {
        Route::get('/one/{id}', 'one')->name('one');
        Route::get('/slug/{slug}', 'slug')->name('slug');
    });
