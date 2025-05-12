<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = collect([]); // Initialize empty collection for cart items
        $cartTotalCost = 0;

        if (Auth::check()) {
            // Authenticated user: Fetch cart items from database
            $carts = Cart::with('product')
                        ->where('user_id', Auth::id())
                        ->get();

            // Calculate total cost considering quantity
            $cartTotalCost = $carts->sum(function ($cart) {
                return ($cart->product->price ?? 0) * $cart->quantity;
            });
        } else {
            // Unauthenticated user: Fetch cart items from session
            $sessionCart = session()->get('cart', []);
            $cartItems = [];

            foreach ($sessionCart as $productId => $item) {
                $product = Product::find($productId);
                if ($product) {
                    $cartItems[] = (object) [
                        'product_id' => $productId,
                        'quantity' => $item['quantity'],
                        'product' => $product,
                    ];
                }
            }

            // Convert to collection for consistency
            $carts = collect($cartItems);

            // Calculate total cost considering quantity
            $cartTotalCost = $carts->sum(function ($cart) {
                return ($cart->product->price ?? 0) * $cart->quantity;
            });
        }

        return view('frontend.cart', compact('carts', 'cartTotalCost'));
    }

    public function store(Request $request, $productId)
    {
        try {
            $product = Product::findOrFail($productId);

            if (Auth::check()) {
                $userId = Auth::user()->id;
                $cartItem = Cart::where('user_id', $userId)
                                ->where('product_id', $product->id)
                                ->first();

                if ($cartItem) {
                    $cartItem->quantity += 1;
                    $cartItem->save();
                } else {
                    Cart::create([
                        'user_id' => $userId,
                        'product_id' => $product->id,
                        'quantity' => 1,
                    ]);
                }
            } else {
                $cart = session()->get('cart', []);
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity']++;
                } else {
                    $cart[$productId] = [
                        'product_id' => $product->id,
                        'quantity' => 1,
                        'name' => $product->name,
                        'price' => $product->price,
                    ];
                }
                session()->put('cart', $cart);
            }

            return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
        } catch (\Exception $e) {
            \Log::error('Error adding product to cart: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the product to the cart.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            if (Auth::check()) {
                $cartItem = Cart::where('user_id', Auth::id())
                                ->where('id', $id)
                                ->firstOrFail();
                $cartItem->quantity = $request->quantity;
                $cartItem->save();
            } else {
                $cart = session()->get('cart', []);
                if (isset($cart[$id])) {
                    $cart[$id]['quantity'] = $request->quantity;
                    session()->put('cart', $cart);
                } else {
                    throw new \Exception('Cart item not found.');
                }
            }

            // Recalculate total cost
            $cartTotalCost = $this->calculateCartTotal();

            return response()->json([
                'success' => true,
                'message' => 'Quantity updated successfully.',
                'cartTotalCost' => $cartTotalCost,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error updating cart quantity: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update quantity.',
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            if (Auth::check()) {
                $cartItem = Cart::where('user_id', Auth::id())
                                ->where('id', $id)
                                ->firstOrFail();
                $cartItem->delete();
            } else {
                $cart = session()->get('cart', []);
                if (isset($cart[$id])) {
                    unset($cart[$id]);
                    session()->put('cart', $cart);
                } else {
                    throw new \Exception('Cart item not found.');
                }
            }

            // Recalculate total cost
            $cartTotalCost = $this->calculateCartTotal();

            return response()->json([
                'success' => true,
                'message' => 'Item removed successfully.',
                'cartTotalCost' => $cartTotalCost,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error removing cart item: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove item.',
            ], 500);
        }
    }

    private function calculateCartTotal()
    {
        $total = 0;
        if (Auth::check()) {
            $carts = Cart::with('product')->where('user_id', Auth::id())->get();
            $total = $carts->sum(function ($cart) {
                return ($cart->product->price ?? 0) * $cart->quantity;
            });
        } else {
            $sessionCart = session()->get('cart', []);
            foreach ($sessionCart as $productId => $item) {
                $product = Product::find($productId);
                if ($product) {
                    $total += ($product->price ?? 0) * $item['quantity'];
                }
            }
        }
        return $total;
    }
}