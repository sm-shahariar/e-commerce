<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $wishlists = Wishlist::with('user', 'product')->select('user_id', 'product_id')->get();
        return view('frontend.wishlist', compact('wishlists'));
    }

    public function store(Request $request, Product $product) {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            
        ]);

        try{
            DB::beginTransaction();

            $wishlist = Wishlist::create([
                'user_id' => $request->user_id,
                'product_id' => $product->id,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Product added to wishlist successfully');

        }catch(\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

   // In WishlistController.php
    public function destroy()
    {
        Wishlist::where('user_id', auth()->id())->delete();
        return redirect()->back()->with('success', 'All wishlist items removed');
    }


}
