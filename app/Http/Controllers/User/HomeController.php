<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\FetchProduct;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\VariantAttribute;
use App\Models\ProductVariant;
use App\Models\VariantAttributeValue;

class HomeController extends Controller
{
    public function index(Request $request) {

        $search = $request->input('search', '');

        if ($search) {
            $products = Product::with('category', 'category.subCategories')
                      ->when($search, function ($query) use ($search) {
                          $query->where('name', 'like', "%{$search}%")
                                ->orWhere('price', 'like', "%{$search}%");
                      })
                      ->select('id', 'name', 'price')->get();

            return view('frontend.partials.productCarts', compact('products'));
        }

        $products = Product::with('category')->select('id', 'name', 'price', 'slug')->take(4)->get();
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


    public function productDetails($slug)
    {

        $variants = [];

        //dd($slug);
        $product = Product::with(['variants', 'variants.attributes'])->where('slug', $slug)->firstOrFail();

        $varientIds = ProductVariant::where('product_id', $product->id)->pluck('id')->toArray();

        $attributes = VariantAttribute::whereIn('product_variant_id', $varientIds)->with('attribute', 'values.value')->get();




        foreach ($attributes as $attribute) {

             //dd($attribute->toArray());

            $variants[] = [
                'product_variation_id' => $attribute->product_variant_id,
                'attribute' => $attribute->id,
                'values' => $attribute->values->map(function ($item) {
                    return $item->id;
                })->toArray()
            ];

        }




        $attributes = $attributes->groupBy('attribute.name')->map(function ($item, $key) {
            return $item->map(function ($item) {
                return $item->values;
            });
        });


        return view('frontend.product-details', compact('product','variants', 'attributes'));
    }

    public function findMatchingVariant(Request $request) {

        $product = Product::with(['variants.attributes', 'variants.attributes.values'])->where('slug', $request->slug)->firstOrFail();

        return response()->json($product);

    }




}
