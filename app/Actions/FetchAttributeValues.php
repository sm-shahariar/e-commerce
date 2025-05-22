<?php

namespace App\Actions;

use App\Models\AttributeValue;

class FetchAttributeValues
{

    public function execute($request) {
        
        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return AttributeValue::query()
            ->when($search, function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->select('id', 'name', 'created_at')
            ->orderBy('id', 'desc')->paginate($perPage)->withQueryString();
    }
}