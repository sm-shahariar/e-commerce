<?php

namespace App\Services;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistService
{

    public static $wishlist;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public static function getWishList()
    {
        $wishlist = [];
        if (Auth::check()) {
            $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->get();
        }

        self::$wishlist = $wishlist;

        return $wishlist;
    }

    public static function getCount()
    {
        $wishlist = self::getWishList();

        return is_array($wishlist) ? count($wishlist) : $wishlist->count();
    }
}
