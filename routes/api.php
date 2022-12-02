<?php

use App\Http\Controllers\api\ApiCategoryController;
use App\Http\Controllers\api\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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
