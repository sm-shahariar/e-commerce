<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\OrderController;
// use App\Http\Controllers\Admin\HomeController;

Route::get('/', [DashboardController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/orders/{product}', [HomeController::class, 'orderPage'])->name('product.order');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/product-details/{id}', [HomeController::class, 'productDetails'])->name('product.details');




Route::get('/dashboard', function () {
    return view('frontend.dashboard');
});

Route::get('/product-details', function() {
    return view('frontend.product-details');
})->name('product.details');

Route::get('/carts', function () {
    return view('frontend.cart');
});

Route::get('/sub-products', function () {
    return view('frontend.product');
});

Route::get('/profiles', function () {
    return view('frontend.profile');
});

// Route::get('/product-orders', function () {
//     return view('frontend.order');
// })->name(');

Route::get('/wish-lists', function () {
    return view('frontend.wishlist');
});


Route::get('/term-conditions', function () {
    return view('frontend.term-conditions');
});





require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


