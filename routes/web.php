<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\FullCalendarController;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\catalog\category\ProductController;
use App\Http\Controllers\catalog\common\CartController;
use App\Http\Controllers\admin\category\ProductController as Admin;
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
Route::get('admin', [Admin::class, 'index'])->name('admin');
Route::get('admin/Product/add', [admin::class, 'editProduct'])->name('add.product');
Route::any('admin/Product/edit', [admin::class, 'editProduct'])->name('edit.product');
Route::any('admin/Product/{id}/remove', [admin::class, 'removeProduct'])->name('remove.product');

// Action Cart
Route::get('cart/loadCart', [CartController::class, 'loadCart'])->name('load.cart');
Route::post('product/addCart', [ProductController::class, 'addCart'])->name('add.cart');
Route::post('product/removeCart', [ProductController::class, 'removeCart'])->name('remove.cart');

// Action Front
Route::get('product/{id}', [ProductController::class, 'index'])->name('view.product');