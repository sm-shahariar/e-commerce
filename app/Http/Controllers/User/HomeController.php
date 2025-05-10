<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\FetchProduct;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariantValue;
use App\Models\ProductVariant;
use App\Models\VariantAttributeValue;

class HomeController extends Controller
{
    public function index(Request $request) {

        $products = Product::with('category')->select('id', 'name', 'price')->take(4)->get();
        $newProducts = Product::with('category')->select('id', 'name', 'price')->orderBy('id', 'desc')->take(4)->get();
        $mostSoldProducts = Product::withCount('orderItems')->select('id', 'name', 'price')->take(4)->get();
        $menProducts = Product::with('category')
                    ->whereHas('category', function ($query) {
                        $query->where('name', 'Men');
                    })
                    ->select('id', 'name', 'price')->take(4)->get();
        $womenProducts = Product::with('category')
                      ->whereHas('category', function ($query) {
                        $query->where('name', 'Women');
                      })
                      ->select('id', 'name', 'price')->take(4)->get();

        $kidProducts = Product::with('category')
                    ->whereHas('category', function ($query) {
                    $query->where('name', 'Kids');
                    })
                    ->select('id', 'name', 'price')->take(4)->get();            

        return view('frontend.home', get_defined_vars());
    }

    public function orderPage(Request $request, Product $product)
    {
        
        // Fetch all variant values of the product with their related attribute and value
        $productVariants = ProductVariant::where('product_id', $product->id)->select('id', 'price')->get();
        $variants = VariantAttributeValue::with(['productVariant', 'productAttribute', 'productAttributeValue'])
            ->whereIn('product_variant_id', $productVariants->pluck('id'))
            ->get();


        // Group variants by attribute (e.g., Color, Size)
        $groupedVariants = [];

        if ($variants->isNotEmpty()) {
            $groupedVariants = $variants->groupBy(function ($item) {
                return strtolower($item->productAttribute->name);
            });
            // dd($groupedVariants);
        }

        return view('frontend.order', compact('product', 'groupedVariants', 'variants', 'productVariants'));
    }


    public function productDetails(Request $request, $id)
    {
        $product = Product::findOrFail($id); 
        // Now you can safely use $product->id below
        $productVariants = ProductVariant::where('product_id', $product->id)->select('id', 'price')->get();

        $variants = VariantAttributeValue::with(['productVariant', 'productAttribute', 'productAttributeValue'])
            ->whereIn('product_variant_id', $productVariants->pluck('id'))
            ->get();

        $groupedVariants = [];

        if ($variants->isNotEmpty()) {
            $groupedVariants = $variants->groupBy(function ($item) {
                return strtolower($item->productAttribute->name);
            });
        }

        return view('frontend.product-details', compact('product', 'groupedVariants', 'variants', 'productVariants'));
    }


   
    
}
