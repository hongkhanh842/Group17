<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::prefix('admin')->controller(AdminHomeController::class)->name('admin.')->group(function () {
// Administrator routes
    Route::get('/', 'index')->name('index');
// Admin category routes
    Route::prefix('category')->controller(AdminCategoryController::class)->name('category.')
        ->group(function () {
        Route::get('/',             'index')  ->name('index');
        Route::get('/create',       'create') ->name('create');
        Route::post('/store',       'store')  ->name('store');
        Route::get('/edit/{id}',    'edit')   ->name('edit');
        Route::post('/update/{id}', 'update') ->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/show/{id}',    'show')   ->name('show');
        });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
