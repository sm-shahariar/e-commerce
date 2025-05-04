<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Actions\FetchProductVariant;
use App\Models\ProductVariantValue;
use App\Models\ProductAttributeValue;
use App\Models\ProductAttribute;
use App\Models\VariantAttributeValue;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductVariantController extends Controller
{

    public function index(Request $request) {

        $productVariants = (new FetchProductVariant)->execute($request);
        $products = Product::all();
        $variantValues = ProductVariantValue::with('productAttributeValue', 'productAttribute')->get();

        if ($request->ajax()) {
            return view('components.productVariants.table', ['productVariants' => $productVariants, 'products' => $products, 'variantValues' => $variantValues ]);
        }

        return view('backend.productVariants.index', get_defined_vars());
    }


    public function create() {

        $products = Product::all();
        // $variantValues = ProductVariantValue::with('productAttributeValue', 'productAttribute')->get();
        $attributeValues = ProductAttributeValue::all();
        $attributes = ProductAttribute::all();
        return view('backend.productVariants.create', compact('products', 'attributeValues', 'attributes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'sku' => 'required|string|max:255|unique:product_variants,sku',
            'price' => 'required|numeric|min:0',
            'qty' => 'nullable|integer|min:0',
            'attributes' => 'required|array|min:1',
            'attributes.*.attribute_id' => 'required|exists:product_attributes,id',
            'attributes.*.attribute_value_id' => 'required|array|min:1',
            'attributes.*.attribute_value_id.*' => 'required|exists:product_attribute_values,id',
        ]);

        try {
            DB::beginTransaction();

            // Create the main product variant
            $variant = ProductVariant::create([
                'product_id' => $request->product_id,
                'sku' => $request->sku,
                'price' => $request->price,
                'qty' => $request->qty ?? 0,
            ]);

            // Insert into product_attribute_values_option table
            foreach ($request->input('attributes') as $attribute) {
                $attributeValueIds = (array) $attribute['attribute_value_id']; // Cast to array in case it's not

                foreach ($attributeValueIds as $valueId) {
                    $option = DB::table('variant_attribute_values')->insert([
                        'product_variant_id' => $variant->id,
                        'product_attribute_id' => $attribute['attribute_id'],
                        'product_attribute_value_id' => $valueId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    if (!$option) {
                        throw new \Exception('Failed to insert attribute value option');
                    }
                }
            }

            DB::commit();

            return response()->json([
                'message' => 'Product Variant Created Successfully',
                'type' => 'success',
                'data' => $variant,
                'redirect' => route('admin.product-variants.index'),
            ], 201);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'type' => 'error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function edit(ProductVariant $productVariant)
{
    $products = Product::all();
    $attributes = ProductAttribute::all();
    $attributeValues = ProductAttributeValue::all();

    // Load attribute values related to the variant
    $variantAttributes = DB::table('variant_attribute_values')
        ->where('product_variant_id', $productVariant->id)
        ->get()
        ->groupBy('product_attribute_id');

    return view('backend.productVariants.edit', compact(
        'productVariant', 'products', 'attributes', 'attributeValues', 'variantAttributes'
    ));
}



    public function update(Request $request, ProductVariant $productVariant)
    {
        // dd($request->all());
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'sku' => 'required|string|max:255|unique:product_variants,sku,' . $productVariant->id,
            'price' => 'required|numeric|min:0',
            'qty' => 'nullable|integer|min:0',
            'attributes' => 'required|array|min:1',
            'attributes.*.attribute_id' => 'required|exists:product_attributes,id',
            'attributes.*.attribute_value_id' => 'required|array|min:1',
            'attributes.*.attribute_value_id.*' => 'required|exists:product_attribute_values,id',
        ]);

        try {
            DB::beginTransaction();
        
            // Update product variant
            $productVariant->update([
                'product_id' => $request->product_id,
                'sku' => $request->sku,
                'price' => $request->price,
                'qty' => $request->qty ?? 0,
            ]);
            // dd($productVariant);
        
            // dd($request->input('attributes'));
           // Step 1: Collect input values for easier lookup
            $inputAttributes = [];
            foreach ($request->input('attributes') as $attribute) {
                foreach ($attribute['attribute_value_id'] as $valueId) {
                    $inputAttributes[] = [
                        'attribute_id' => $attribute['attribute_id'],
                        'value_id' => $valueId,
                    ];
                }
            }

            // Step 2: Delete records from DB that are NOT in input
            $existingValues = VariantAttributeValue::where('product_variant_id', $productVariant->id)->get();

            foreach ($existingValues as $variantAttributeValue) {
                $inInput = collect($inputAttributes)->contains(function ($attr) use ($variantAttributeValue) {
                    return $attr['attribute_id'] == $variantAttributeValue->product_attribute_id &&
                        $attr['value_id'] == $variantAttributeValue->product_attribute_value_id;
                });

                if (!$inInput) {
                    $variantAttributeValue->delete();
                }
            }

            // Step 3: Insert records that do NOT exist
            foreach ($inputAttributes as $attr) {
                $exists = VariantAttributeValue::where('product_variant_id', $productVariant->id)
                    ->where('product_attribute_id', $attr['attribute_id'])
                    ->where('product_attribute_value_id', $attr['value_id'])
                    ->exists();

                if (!$exists) {
                    VariantAttributeValue::create([
                        'product_variant_id' => $productVariant->id,
                        'product_attribute_id' => $attr['attribute_id'],
                        'product_attribute_value_id' => $attr['value_id'],
                    ]);
                }
            }

            DB::commit();
        
            return response()->json([
                'message' => 'Product Variant Updated Successfully',
                'type' => 'success',
                'redirect' => route('admin.product-variants.index'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'type' => 'error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }






    public function destroy(ProductVariant $productVariant) {
        
        $productVariant->delete();
        // return reditr()->json(['message' => 'Product Variant Deleted Successfully', 'type' => 'success'], 200);
        return redirect()->back()->with('success', 'Product Variant Deleted Successfully');
    }
    
}
