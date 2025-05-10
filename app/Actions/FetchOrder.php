<?php

namespace App\Actions;

use App\Models\Order;

class FetchOrder
{
    public function execute($request) {
        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return Order::query()
            ->with(['user', 'orderItems'])
            ->when($search, function($query) use ($search) {
                $query->where('order_number', 'like', "%{$search}%")
                    ->orWhere('user_id', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->select('id', 'order_number', 'user_id', 'status', 'created_at')
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->withQueryString();
    }
}