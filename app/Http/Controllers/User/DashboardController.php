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
    public function index() {

        $orders = Order::with('orderItems.variants', 'orderItems.variants.attributes.attribute', 'orderItems.variants.attributes.values.value')->where('user_id', auth()->user()->id)
               ->select('id', 'user_id', 'status', 'created_at')
               ->orderBy('id', 'desc')
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

    public function orderTable(Request $request) {

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 50);

        $orderItems = OrderItem::with(['order', 'product'])
                  ->when($search, function ($query) use ($search) {
                      $query->where('product_id', 'like', "%{$search}%")
                        ->orwhere('order_id', 'like', "%{$search}%");
                  })
                  ->select('id', 'order_id', 'product_id', 'quantity', 'price', 'created_at')
                  ->orderBy('id', 'desc')->paginate($perPage);

        return view('frontend.orderlist', compact('orderItems'));
    }

}
