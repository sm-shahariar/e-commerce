<?php

namespace App\Actions;

use App\Models\ProductAttributeValue;

class FetchProductAttributeValues
{

    public function execute($request) {
        
        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return ProductAttributeValue::query()
            ->when($search, function($query) use ($search) {
                $query->where('value', 'like', "%{$search}%");
            })
            ->select('id', 'value', 'created_at')
            ->orderBy('id', 'desc')->paginate($perPage)->withQueryString();
    }
}