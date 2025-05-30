<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\OrderItem;
use Illuminate\Http\Request;

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

        $user = auth()->user();


        return view('frontend.dashboard', get_defined_vars());
    }

    public function orderTable(Request $request)
    {

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 20);

        $orders = Order::with('orderItems', 'user', 'orderItems.variant', 'orderItems.variant.attributes', 'orderItems.variant.attributes.attribute', 'orderItems.variant.attributes.values', 'orderItems.variant.attributes.values.value')
            ->when($search, function ($query) use ($search) {
                $query->where('order_number', 'like', "%{$search}%");
            })
            ->select('id', 'order_number', 'phone_number', 'address', 'user_id', 'payment_type', 'status')
            ->orderBy('id', 'desc')->paginate($perPage)->withQueryString();


        return view('frontend.orderlist', compact('orders'));
    }
}
