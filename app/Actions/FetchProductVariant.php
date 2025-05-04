<?php

namespace App\Actions;

use App\Models\ProductVariant;

class FetchProductVariant
{

    public function execute($request) {

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return ProductVariant::query()
            ->with('product')
            ->when($search, function($query) use ($search) {
                $query->where('product_id', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%")
                    ->orWhere('price', 'like', "%{$search}%")
                    ->orWhere('qty', 'like', "%{$search}%");
            })
            ->select('id', 'product_id', 'sku', 'price', 'qty', 'created_at')
            ->orderBy('id', 'desc')
            ->paginate($perPage)->withQueryString();
    }

}