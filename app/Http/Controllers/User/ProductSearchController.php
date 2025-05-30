<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductSearchController extends Controller
{

    public function index(Request $request)
    {

        $perPage = $request->input('perPage', 10);
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sort = $request->input('sort');
        $category = $request->input('category');
        $query = $request->input('query');


        $products = Product::query();

        if($request->has('query')){
            $products->where('name', 'like', "%$query%");
        }

        if($request->has('min_price') && $request->has('max_price')){
            $products->whereBetween('price', [$minPrice, $maxPrice]);
        }

        if($request->has('category')){
            $products->where('category_id', $category);
        }

        if($request->has('sort')){
            if($sort == 'low'){
                $products->orderBy('price', 'asc');
            }else if($sort == 'heigh'){
                $products->orderBy('price', 'desc');
            }else if($sort == 'newest'){
                $products->orderBy('created_at', 'desc');
            }
            else if($sort == 'oldest'){
                $products->orderBy('created_at', 'asc');
            }
        }

        $categories = Category::all();

        $products = $products->paginate($perPage)->withQueryString();

        return view('frontend.product', compact('categories', 'products'));
    }

}
