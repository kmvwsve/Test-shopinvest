<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\FullCalendarController;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\catalog\category\ProductController;
use App\Http\Controllers\catalog\common\CartController;
use App\Http\Controllers\admin\common\ConnectController;
use App\Http\Controllers\admin\category\ProductController as AdminProduct;
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

// Action Admin
// Route::get('admin', [AdminProduct::class, 'index'])->name('admin');
Route::any('admin', [ConnectController::class, 'index'])->name('connect');
Route::any('admin/login', [ConnectController::class, 'index'])->name('login.admin');
Route::get('admin/logout', [ConnectController::class, 'logout'])->name('logout.admin');
Route::get('admin/Products', [AdminProduct::class, 'index'])->name('list.product');
Route::get('admin/Product/add', [AdminProduct::class, 'editProduct'])->name('add.product');
Route::any('admin/Product/edit', [AdminProduct::class, 'editProduct'])->name('edit.product');
Route::any('admin/Product/{id}/remove', [AdminProduct::class, 'removeProduct'])->name('remove.product');

// Action Cart
Route::get('cart/loadCart', [CartController::class, 'loadCart'])->name('load.cart');
Route::post('product/addCart', [ProductController::class, 'addCart'])->name('add.cart');
Route::post('product/removeCart', [ProductController::class, 'removeCart'])->name('remove.cart');

// Action Front
Route::get('product/{id}', [ProductController::class, 'index'])->name('view.product');