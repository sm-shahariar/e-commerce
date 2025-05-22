<?php

namespace App\Actions;

use App\Models\Attribute;

class FetchAttributes
{

    public function execute($request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);

        return Attribute::query()
            ->when($search, function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->select('id', 'name', 'created_at')
            ->orderBy('id', 'desc')->paginate($perPage)->withQueryString();
    }
}