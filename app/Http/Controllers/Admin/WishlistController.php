<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $wishlists = Wishlist::with('user', 'product', 'product.variants', 'productVariant')->select('user_id', 'product_id')->get();

        return view('frontend.wishlist', compact('wishlists'));
    }

    public function store(Request $request, $productId)
    {

        try {

            $request->validate([
                'product_variant_id' => 'required|exists:product_variants,id',
            ]);

            DB::beginTransaction();

            $product = Product::with('variants')->findOrFail($productId);

            $variantId = $request->input('product_variant_id');

            if (Auth::check()) {

                $userId = Auth::user()->id;

                $wishlist = Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $product->id,
                    'product_variant_id' => $variantId
                ]);
                // dd($wishlist->toArray());
            } else {
                return redirect()->back()->with('error', 'Please login first');
            }

            DB::commit();

            return redirect()->route('wishlist.index')->with('success', 'Product added to wishlist successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::error("Error") . $th->getMessage();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // In WishlistController.php
    public function destroy()
    {
        Wishlist::where('user_id', auth()->id())->delete();

        if (request()->ajax()) {
            return response()->json([
                'message' => 'All wishlist items removed'
            ], 200);
        }

        return redirect()->back()->with('success', 'All wishlist items removed');
    }
    
}
