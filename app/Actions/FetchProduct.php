<?php

namespace App\Actions;

use App\Models\Product;

class FetchProduct
{
    public function execute($request)
    {
        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return Product::query()
            ->with('category', 'subCategory')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('stock', 'like', "%{$search}%")
                ->orWhere('price', 'like', "%{$search}%");
            })
            ->select('id', 'name', 'slug', 'description', 'price', 'stock', 'category_id', 'sub_category_id', 'created_at')
            ->orderBy('id', 'desc')->paginate($perPage)->withQueryString();
    }
}