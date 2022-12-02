<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('category')->controller(CategoryController::class)->name('category.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/show/{id}', 'show')->name('show');
    });

Route::prefix('product')->controller(ProductController::class)->name('product.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/show/{id}', 'show')->name('show');
    });

