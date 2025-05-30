<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function liveSearch(Request $request)
{
    $query = $request->input('query');

    // Direct product matches
    $productMatches = Product::with('category')
        ->where('name', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->orWhere('price', 'like', '%' . $query . '%')
        ->limit(8) // Increased limit for better results
        ->get();

    // Products under matching categories
    $categoryMatches = Category::where('name', 'like', '%' . $query . '%')
        ->with(['products' => function($q) {
            $q->limit(12);
        }])
        ->get();

    $results = [];

    // Direct product matches
    foreach ($productMatches as $product) {
        $results[] = [
            'type' => 'product',
            'from_category' => false,
            'name' => $product->name,
            'slug' => $product->slug,
            'price' => number_format($product->price, 2),
            'image_url' => $product->thumbnail ?? null,
            'category_name' => $product->category->name ?? null
        ];
    }

    // Products under matched categories
    foreach ($categoryMatches as $category) {
        foreach ($category->products as $product) {
            $results[] = [
                'type' => 'product',
                'from_category' => true,
                'category_name' => $category->name,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => number_format($product->price, 2),
                'image_url' => $product->thumbnail ?? null,
            ];
        }
    }

    return response()->json([
        'results' => $results,
        'count' => count($results)
    ]);
}
}
