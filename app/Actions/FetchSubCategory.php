<?php

namespace App\Actions;

use App\Models\SubCategory;

class FetchSubCategory
{

    public function execute($request)
    {

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return SubCategory::query()
            ->with('category')
            ->when($search, function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('category_id', 'like', "%{$search}%");
            })
            ->select('id', 'name', 'slug', 'status', 'category_id', 'created_at')
            ->orderBy('id', 'desc')->paginate($perPage)->withQueryString();
    }
}