<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Actions\FetchProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function index(Request $request) {
        $products = (new FetchProduct)->execute($request);
        $categories = Category::select('id', 'name', 'slug')->get();
        $subCategories = SubCategory::select('id', 'name', 'slug')->get();

        if ($request->ajax()) {
            return view('components.products.table', ['products' => $products, 'categories' => $categories, 'subCategories' => $subCategories])->render();
        }

        return view('backend.products.index', compact('products', 'categories', 'subCategories'));
    }


    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $subCategories = SubCategory::select('id', 'name')->get();

        return view('backend.products.create', compact('subCategories', 'categories'));
    }

    public function store(Request $request) {

        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'description' => 'nullable|string|max:255',
            'thumbnail' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try{

            DB::beginTransaction();

            $product = Product::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'description' => $request->description,
            ]);

           $product->thumbnail = $request->file('thumbnail');

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $product->images = $image;
                }
            }
            
            $product->save();
            DB::commit();
            return response()->json(['message' => 'Product created successfully!', 'type' => 'success', 'redirect' => route('admin.products.index')], 200);

        }catch(\Throwable $th) {
            DB::rollback();
            return response()->json(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }


    public function edit(Product $product) {

        $categories = Category::select('id', 'name')->get();
        $subCategories = SubCategory::select('id', 'name')->get();

        return view('backend.products.edit', compact('product', 'categories', 'subCategories'));
    }

    public function update(Request $request, Product $product) {

        $request->validate([
            'name' => 'required|string|max:255,'.$product->id,
            'slug' => 'required|string|max:255|unique:products,slug,'.$product->id,
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'description' => 'nullable|string|max:255',
        ]);

        try{

            DB::beginTransaction();

            $product->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'description' => $request->description,
            ]);

            $product->thumbnail = $request->file('thumbnail');

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $product->images = $image;
                }
            }

            $product->save();
            DB::commit();
            return response()->json(['type' => 'success', 'message' => 'Product updated successfully', 'data' => $product],201);

        }catch(\Throwable $th) {
            DB::rollback();
            return response()->json(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function destroy(Product $product) {
        
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }


    public function search(Request $request)
    {
        $search = $request->search ?? '';
        $query = Product::query();

        if ($search !== '') {
            $query->where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('slug', 'LIKE', '%'.$search.'%');
        }
        $products = $query->orderBy('id', 'desc')->limit(50)->get();
        $productCount = $products->count();

        if ($productCount === 0) {
            return '<h5>Product Not Found</h5>';
        } else {
            return view('backend.products.search_list', compact('products'));
        }
    }
}
