<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\VariantAttributeValue;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems', 'user', 'orderItems.variant', 'orderItems.variant.attributes', 'orderItems.variant.attributes.attribute', 'orderItems.variant.attributes.values', 'orderItems.variant.attributes.values.value')
            ->where('user_id', auth()->user()->id)
            ->select('id', 'order_number', 'phone_number', 'address', 'user_id', 'payment_type', 'status', 'created_at')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        //    dd($orders->toArray());

        $orderCount = $orders->count();

        $wishlists = Wishlist::with(['product', 'productVariant'])->where('user_id', auth()->user()->id)
            ->select('id', 'user_id', 'product_id', 'created_at')
            ->get();
        $wishlistCount = $wishlists->count();

        $carts = Cart::with('product')->where('user_id', auth()->user()->id)
            ->select('id', 'user_id', 'product_id')->get();
        $cartCount = $carts->count();

        return view('index', get_defined_vars());
    }
}
