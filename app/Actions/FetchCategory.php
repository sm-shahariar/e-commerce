<?php

namespace App\Actions;

use App\Models\Category;

class FetchCategory
{
    public function execute($request) {

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        return Category::query()
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        })
        ->select('id', 'name', 'slug', 'status', 'created_at')
        ->orderBy('id', 'desc')->paginate($perPage)->withQueryString();
    }
}