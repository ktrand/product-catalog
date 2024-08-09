<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::post('/cart', [ProductController::class, 'store'])->name('cart.store');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/set-order', [OrderController::class, 'setOrder'])->name('orders.set');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
