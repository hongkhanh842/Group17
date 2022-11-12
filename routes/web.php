<?php

use App\Http\Controllers\AdminPanel\AdminProductController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\AdminPanel\CommentController;
use App\Http\Controllers\AdminPanel\FaqController;
use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\AdminPanel\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\UserController;
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

//Home Page routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::post('/storemessage', [HomeController::class, 'storemessage'])->name('storemessage');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::post('/storecomment', [HomeController::class, 'storecomment'])->name('storecomment');
Route::view('/loginuser', 'home.login')->name('loginuser');
Route::view('/registeruser', 'home.register')->name('registeruser');
Route::get('/logoutuser', [HomeController::class, 'logout'])->name('logoutuser');


Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::get('/categoryproducts/{id}/{slug}', [HomeController::class, 'categoryproducts'])->name('categoryproducts');

//User Auth
Route::middleware('auth')->group(function () {

//User Panel Route
    Route::prefix('userpanel')->prefix('userpanel')->controller(UserController::class)->name('userpanel.')->group(function (
    ) {
        Route::get('/', 'index')->name('index');
        Route::get('/reviews', 'reviews')->name('reviews');
        Route::get('/reviewdestroy/{id}', 'reviewdestroy')->name('reviewdestroy');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/orderdetail/{id}', 'orderdetail')->name('orderdetail');
    });

    // ShopCart routes
    Route::prefix('shopcart')->controller(ShopCartController::class)->name('shopcart.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/add/{id}', 'add')->name('add');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/order', 'order')->name('order');
            Route::post('/storeorder', 'storeorder')->name('storeorder');
            Route::get('/ordercomplete', 'ordercomplete')->name('ordercomplete');
        });

//Admin route
    Route::middleware('admin')->prefix('admin')->controller(AdminHomeController::class)->name('admin.')->group(function (
    ) {
        Route::get('/', 'index')->name('index');
// Admin general routes
        Route::get('/setting', 'setting')->name('setting');
        Route::post('/setting', 'settingUpdate')->name('setting.update');

// Admin category routes
        Route::prefix('category')->controller(AdminCategoryController::class)->name('category.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/destroy/{id}', 'destroy')->name('destroy');
                Route::get('/show/{id}', 'show')->name('show');
            });
// Admin product routes
        Route::prefix('product')->controller(AdminProductController::class)->name('product.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/destroy/{id}', 'destroy')->name('destroy');
                Route::get('/show/{id}', 'show')->name('show');
            });
// Admin image routes
        Route::prefix('image')->controller(ImageController::class)->name('image.')
            ->group(function () {
                Route::get('/{pid}', 'index')->name('index');
                Route::post('/store/{pid}', 'store')->name('store');
                Route::get('/destroy/{pid}/{id}', 'destroy')->name('destroy');
            });
// Admin message routes
        Route::prefix('message')->controller(MessageController::class)->name('message.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/show/{id}', 'show')->name('show');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/destroy/{id}', 'destroy')->name('destroy');
            });

        // Admin faq routes
        Route::prefix('faq')->controller(FaqController::class)->name('faq.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/destroy/{id}', 'destroy')->name('destroy');
                Route::get('/show/{id}', 'show')->name('show');
            });

        // Admin comment routes
        Route::prefix('comment')->controller(CommentController::class)->name('comment.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/show/{id}', 'show')->name('show');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/destroy/{id}', 'destroy')->name('destroy');
            });

        // Admin user routes
        Route::prefix('user')->controller(AdminUserController::class)->name('user.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::get('/show/{id}', 'show')->name('show');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/destroy/{id}', 'destroy')->name('destroy');
                Route::post('/addrole/{id}', 'addrole')->name('addrole');
                Route::get('/destroyrole/{uid}/{rid}', 'destroyrole')->name('destroyrole');
            });
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
