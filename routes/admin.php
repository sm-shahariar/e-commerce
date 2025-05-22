<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\DashboardController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('sub-categories', SubCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('attribute-values', AttributeValueController::class);
    Route::resource('product-variants', ProductVariantController::class);
    Route::resource('product-variant-values', AttributeValueController::class);


    // Route::resource('orders', OrderController::class);

    // Single Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/product/search', [ProductController::class, 'search'])->name('products.search');
    Route::patch('/categories/{id}/status', [CategoryController::class, 'status_change'])->name('categories.status');
    Route::patch('/sub-categories/{id}/status', [SubCategoryController::class, 'status_change'])->name('sub-categories.status');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('product-variants/values/{id}', [ProductVariantController::class, 'getValues'])->name('product-variants.get-values');

});


