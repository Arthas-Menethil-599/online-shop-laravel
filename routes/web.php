<?php

use App\Http\Controllers\Admin\AnalyticController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Analytic;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', ProductController::class);
Route::get('concrete_category/{category}/', [\App\Http\Controllers\CategoryController::class, 'show'])
    ->name('concrete_category');
Route::put('products/{product}/removeImage', [ProductController::class, 'removeImage'])
    ->name('products.removeImage');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index')
    ->middleware('auth');
Route::post('/cart_add', [CartController::class, 'addToCart'])
    ->name('cart.add')
    ->middleware('auth');
Route::post('/cart_remove', [CartController::class, 'removeFromCart'])
    ->name('cart.remove')
    ->middleware('auth');
Route::post('/cart_update', [CartController::class, 'updateCart'])
    ->name('cart.update')
    ->middleware('auth');
Route::post('/confirm_purchase', [CartController::class, 'confirm_purchase'])
    ->name('confirm_purchase')
    ->middleware('auth');


Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])
        ->name('admin.home.index');
    Route::resource('category', CategoryController::class);
    Route::get('/analytics', [AnalyticController::class, 'index'])
        ->name('admin.payments')
        ->middleware('auth');
});
