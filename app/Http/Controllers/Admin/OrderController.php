<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Actions\FetchOrder;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');

       $orderItems = OrderItem::with(['order', 'product'])->select('id', 'order_id', 'product_id', 'quantity', 'price', 'created_at')->get();
       $customers = Customer::with('orders')->select('id', 'name', 'order_id', 'email', 'zip', 'city', 'phone', 'address', 'created_at')->get();
       $products = Product::all();

       $orders = Order::with('customer')
                ->where(function ($query) use ($search) {
                    $query->where('order_number', 'like', "%{$search}%")
                          ->orWhere('status', 'like', "%{$search}%")
                          ->orWhere('customer_id', 'like', "%{$search}%");
                })
                ->select('id', 'customer_id', 'order_number', 'status', 'created_at')->paginate(10);



        if ($request->ajax()) {
            return view('components.orders.table', ['orders' => $orders, 'orderItems' => $orderItems, 'customers' => $customers, 'products' => $products])->render();
        }
        return view('backend.orders.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'status' => 'nullable|in:pending,completed,cancelled',
            'customer_id' => 'nullable|exists:customers,id',
            'note' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
            'product_variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',

            // Customer fields
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'zip' => 'required|string',
            'address' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => auth()->user()->id,
                'order_number' => rand(100000, 999999),
                'status' => 1,
                'note' => $request->note,
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id,
                'product_variant_id' => $request->product_variant_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);

            $customer = Customer::create([
                'order_id' => $order->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'zip'   => $request->zip,
                'address' => $request->address,
            ]);

            $order->customer_id = $customer->id;
            $order->save();

            DB::commit();
            return response()->json(['type' => 'success', 'message' => 'Order created successfully'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error('Error creating order: ' . $th->getMessage()); // Log error details
            return response()->json(['type' => 'error', 'message' => $th->getMessage()], 500);
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
