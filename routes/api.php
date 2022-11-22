<?php

use App\Http\Controllers\ApiController;
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

Route::get('/product/', [ApiController::class, 'product'])->name('api.product');
Route::get('/category', [ApiController::class, 'category'])->name('api.category');
Route::get('/comment', [ApiController::class, 'comment'])->name('api.comment');
Route::get('/faq', [ApiController::class, 'faq'])->name('api.faq');
Route::get('/message', [ApiController::class, 'message'])->name('api.message');
Route::get('/order', [ApiController::class, 'order'])->name('api.order');
Route::get('/orderproduct', [ApiController::class, 'orderproduct'])->name('api.orderproduct');
/*Route::get('/image', [ApiController::class, 'image'])->name('api.image');*/

