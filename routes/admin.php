<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('category')
    ->middleware('manager')
    ->controller(CategoryController::class)->name('category.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/show/{id}', 'show')->name('show');
    });

Route::prefix('product')
    ->middleware('manager')
    ->controller(ProductController::class)->name('product.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/show/{id}', 'show')->name('show');
    });

Route::prefix('image')
    ->middleware('manager')
    ->controller(ImageController::class)->name('image.')
    ->group(function () {
        Route::get('/{pid}', 'index')->name('index');
        Route::post('/store/{pid}', 'store')->name('store');
        Route::get('/destroy/{pid}/{id}', 'destroy')->name('destroy');
    });

Route::prefix('user')
    ->middleware('manager')
    ->controller(UserController::class)->name('user.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::middleware('super')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });
    });

Route::prefix('order')
    ->controller(OrderController::class)->name('order.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/show/{id}', 'show')->name('show');
    });
