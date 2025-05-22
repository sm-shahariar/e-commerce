<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;
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
            $carts = Cart::with(['productVariant.attributes','productVariant.attributes.attribute','productVariant.attributes.values.value'])
                        ->where('user_id', Auth::id())
                        ->get();

            // Calculate total cost considering quantity
            $cartTotalCost = $carts->sum(function ($cart) {
                $price = $cart->productVariant->price ?? $cart->product->price ?? 0;
                return $price * $cart->quantity;
            });
        } else {
            // Unauthenticated user: Fetch cart items from session
            $sessionCart = session()->get('cart', []);
            $cartItems = [];

            foreach ($sessionCart as $key => $item) {
                $product = Product::with('variants')->find($item['product_id'] ?? null);
                $productVariant = ProductVariant::with('attributes')->find($item['product_variant_id'] ?? null);

                // Check if both product and productVariant exist
                if ($product && $productVariant) {
                    $cartItems[] = (object) [
                        'product_id' => $product->id,
                        'product_variant_id' => $productVariant->id, // Assuming product_variant_id is stored in the session
                        'quantity' => $item['quantity'],
                        'product' => $product,
                        'productVariant' => $productVariant,
                        'allVariants' => $product->variants,
                    ];
                }
            }

            // Convert to collection for consistency
            $carts = collect($cartItems);

            // Calculate total cost considering quantity
            $cartTotalCost = $carts->sum(function ($cart) {
                $price = $cart->productVariant->price ?? $cart->product->price ?? 0;
                return $price * $cart->quantity;
            });
        }


        return view('frontend.cart', compact('carts', 'cartTotalCost'));
    }

    public function store(Request $request, $productId)
    {
        try {
             $request->validate([
                'product_variant_id' => 'required|exists:product_variants,id',
            ]);

            $product = Product::with('variants')->findOrFail($productId);

            $variantId = $request->input('product_variant_id');
            // dd($variantId);

            if (Auth::check()) {
                //kaj ase
                $userId = Auth::user()->id;

                    $cartItem = Cart::where('user_id', $userId)
                            ->where('product_id', $product->id)
                            ->where('product_variant_id', $variantId)
                            ->first();

                if ($cartItem) {
                    $cartItem->quantity += 1;
                    $cartItem->save();
                } else {
                    Cart::create([
                        'user_id' => $userId,
                        'product_id' => $product->id,
                        'product_variant_id' => $variantId,
                        'quantity' => 1,
                    ]);
                }
            } else {
                $cart = session()->get('cart', []);

                foreach ($product->variants as $variant) {
                $key = $productId . '-' . $variantId;

                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity']++;
                } else {
                    $cart[$productId] = [
                        'product_id' => $product->id,
                        'product_variant_id' => $variantId,
                        'quantity' => 1,
                        'name' => $product->name,
                        'price' => $product->price,
                    ];
                }
            }
                session()->put('cart', $cart);
            }

            //if request is ajax
            if ($request->ajax()) {
                return response()->json(['success' => 'Product added to cart successfully.']);
            }


            return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
        } catch (\Exception $e) {

            if ($request->ajax()) {
                return response()->json(['error' => 'An error occurred while adding the product to the cart.']);
            }

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

    // clear cart all items
    public function clearCart()
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('cart');
        }
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
    }


    // remove item from cart
    public function removeItemFromCart($productId)
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }
        }
        return redirect()->route('cart.index')->with('success', 'Item removed successfully.');
    }
}
