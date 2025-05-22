<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public static $cart;
    /**
     * Create a new class instance.
     */
    public static function getCart()
    {
        if (Auth::check()) {

            // Authenticated user: Fetch cart items from database
            $cart = Cart::with('product')
                ->where('user_id', Auth::id())
                ->get();

            self::$cart = $cart;

        } else {
            // Unauthenticated user: Fetch cart items from session
            $sessionCart = session()->get('cart', []);

            self::$cart = $sessionCart;
        }

        return self::$cart;
    }

    public static function getCount()
    {
        $cart = self::getCart();
         return is_array($cart) ? count($cart) : $cart->count();
    }
}