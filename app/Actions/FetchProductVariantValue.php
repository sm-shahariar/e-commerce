<?php

namespace App\Actions;

use App\Models\VariantAttribute;


class FetchVariantAttribute
{
    public function execute($request) {

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return VariantAttribute::query()
            ->with('productVariant', 'AttributeValue', 'Attribute')
            ->when($search, function($query) use ($search) {
                $query->where('product_variant_id', 'like', "%{$search}%")
                        ->orWhere('product_attribute_value_id', 'like', "%{$search}%")
                        ->orWhere('product_attribute_id', 'like', "%{$search}%");
            })
            ->select('id', 'product_variant_id', 'product_attribute_value_id', 'product_attribute_id')
            ->orderBy('id', 'desc')
            ->paginate($perPage)->withQueryString();
    }
}