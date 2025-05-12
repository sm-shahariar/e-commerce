<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [DashboardController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/orders/{product}', [HomeController::class, 'orderPage'])->name('product.order');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/product-details/{id}', [HomeController::class, 'productDetails'])->name('product.details');
Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlists/{product}', [WishlistController::class, 'store'])->name('wishlist.store');
Route::delete('/wishlists-delete', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
Route::get('/carts', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{productId}', [CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{productId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');






Route::get('/dashboard', function () {
    return view('frontend.dashboard');
});


// Route::get('/carts', function () {
//     return view('frontend.cart');
// });

Route::get('/sub-products', function () {
    return view('frontend.product');
});

Route::get('/profiles', function () {
    return view('frontend.profile');
});



Route::get('/term-conditions', function () {
    return view('frontend.term-conditions');
});





require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


