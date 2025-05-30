<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Actions\FetchOrder;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ProductVariant;
use App\Models\VariantAttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 20);

        $orders = Order::with('orderItems','user', 'orderItems.variant', 'orderItems.variant.attributes', 'orderItems.variant.attributes.attribute', 'orderItems.variant.attributes.values', 'orderItems.variant.attributes.values.value')
            ->when($search, function ($query) use ($search) {
                $query->where('order_number', 'like', "%{$search}%");
            })
            ->select('id', 'order_number', 'phone_number', 'address','user_id', 'payment_type', 'status')
            ->orderBy('id', 'desc')->paginate($perPage)->withQueryString();

            // dd($orders->toArray());


        if ($request->ajax()) {
            return view('components.orders.table', ['orders' => $orders])->render();
        }
        return view('backend.orders.index', get_defined_vars());
    }

    public function create(Request $request, Product $product)
    {

        // Fetch all variant values of the product with their related attribute and value
        $productVariant = ProductVariant::with('product')->where('product_id', $product->id)->select('id', 'price')->first();

        $variants = VariantAttributeValue::with(['variant', 'variantAttribute', 'value'])
            ->where('product_variant_id', $productVariant->id)
            ->get();


        return view('frontend.order', compact('product', 'variants', 'productVariant'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'address' => 'required|string',
            'payment_type' => 'required|string|in:cash_on_delivery,online_payment',
        ]);

        try {
            DB::beginTransaction();
            $order = new Order();
            $order->order_number = 'ORD-' . time();
            $order->status = 1;
            $order->user_id = auth()->user()->id;
            $order->phone_number = $request->phone;
            $order->address = $request->address;
            $order->note = $request->note ?? '';
            $order->payment_type = $request->payment_type;
            $order->save();

            $cart = Cart::where('user_id', auth()->user()->id)->get();


            foreach ($cart as $item) {
                $price = $item->productVariant->price;

                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item->product_id;
                $orderItem->product_variant_id = $item->product_variant_id;
                $orderItem->quantity = $item->quantity;
                $orderItem->price = $price;
                $orderItem->save();
            }

            //clear cart
            Cart::where('user_id', auth()->user()->id)->delete();

            DB::commit();
            return redirect()->route('home')->with('success', 'Order created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error('Error creating order: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Error creating order');
        }
    }



    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Order deleted successfully');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Order status updated successfully');
    }
}
