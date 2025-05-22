<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SearchController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/show/{slug}', [HomeController::class, 'productDetails'])->name('product.show');
Route::post('/wishlists/{product}', [WishlistController::class, 'store'])->name('wishlist.store');
Route::get('/search/live', [SearchController::class, 'liveSearch'])->name('search.live');

Route::get('/products', function () {
    return view('frontend.product');
});

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::delete('/wishlists-delete', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{productId}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::delete('/cart/delete/{productId}', [CartController::class, 'removeItemFromCart'])->name('cart.delete');
    Route::delete('/cart/{productId}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/order', [DashboardController::class, 'orderTable'])->name('order.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

});






Route::get('/user-dashboard', function () {
    return view('frontend.dashboard');
});


Route::get('/profiles', function () {
    return view('frontend.profile');
});

Route::get('/term-conditions', function () {
    return view('frontend.term-conditions');
});





require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


