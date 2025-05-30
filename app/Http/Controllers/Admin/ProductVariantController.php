<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Actions\FetchProductVariant;
use App\Models\VariantAttribute;
use App\Models\AttributeValue;
use App\Models\Attribute;
use App\Models\VariantAttributeValue;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductVariantController extends Controller
{

    public function index(Request $request)
    {

        $productVariants = (new FetchProductVariant)->execute($request);
        $products = Product::all();
        $variantValues = VariantAttributeValue::with('value', 'variantAttribute')->get();

        if ($request->ajax()) {
            return view('components.productVariants.table', ['productVariants' => $productVariants, 'products' => $products, 'variantValues' => $variantValues]);
        }

        return view('backend.productVariants.index', get_defined_vars());
    }


    public function create()
    {
        $products = Product::all();
        $attributes = Attribute::all();
        return view('backend.productVariants.create', compact('products', 'attributes'));
    }

    public function getValues($attributeId)
    {
        $attributeValues = AttributeValue::where('attribute_id', $attributeId)->get();
        return response()->json($attributeValues);
    }



    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            // Create the main product variant
            $variant = ProductVariant::create([
                'product_id' => $request->product_id,
                'sku' => $request->sku,
                'price' => $request->price,
                'qty' => $request->qty ?? 0,
            ]);

            foreach ($request->input('attributes') as $attribute) {

                $variantAttribute = VariantAttribute::create([
                    'product_variant_id' => $variant->id,
                    'attribute_id' => $attribute['attribute_id'],
                ]);

                foreach ($attribute['attribute_value_id'] as $value) {
                    VariantAttributeValue::create([
                        'product_variant_id' => $variant->id,
                        'variant_attribute_id' => $variantAttribute->id,
                        'attribute_value_id' => $value,
                    ]);
                }
            }

            // Insert into product_variant_value table

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

    public function edit($id)
    {
        $variant = ProductVariant::find($id);
        $variantAttributes = VariantAttribute::where('product_variant_id', $id)->with('attribute', 'attribute.values', 'values.value')->get();

        $products = Product::all();
        $attributes = Attribute::all();

        return view('backend.productVariants.edit', compact('variant', 'attributes', 'products', 'variantAttributes'));
    }

    public function update(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            // Create the main product variant
            $variant = ProductVariant::find($id);

            $variant->update([
                'product_id' => $request->product_id,
                'sku' => $request->sku,
                'price' => $request->price,
                'qty' => $request->qty ?? 0,
            ]);


            foreach ($request->input('attributes') as $attribute) {

                $variantAttribute = VariantAttribute::where('product_variant_id', $id)->where('attribute_id', $attribute['attribute_id'])->first();

                if ($variantAttribute) {

                    $variantAttribute->update([
                        'attribute_id' => $attribute['attribute_id'],
                    ]);

                    //delete old variant attribute values
                    VariantAttributeValue::where('product_variant_id', $id)->where('variant_attribute_id', $variantAttribute->id)->delete();

                    foreach ($attribute['attribute_value_id'] as $value) {
                        VariantAttributeValue::create([
                            'product_variant_id' => $variant->id,
                            'variant_attribute_id' => $variantAttribute->id,
                            'attribute_value_id' => $value,
                        ]);
                    }

                } else {

                    $variantAttribute = VariantAttribute::create([
                        'product_variant_id' => $variant->id,
                        'attribute_id' => $attribute['attribute_id'],
                    ]);

                    foreach ($attribute['attribute_value_id'] as $value) {
                        VariantAttributeValue::create([
                            'product_variant_id' => $variant->id,
                            'variant_attribute_id' => $variantAttribute->id,
                            'attribute_value_id' => $value,
                        ]);
                    }
                }
            }

            // Insert into product_variant_value table

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


    // public function update(Request $request, ProductVariant $productVariant)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'sku' => 'required|string|max:255|unique:product_variants,sku,' . $productVariant->id,
    //         'price' => 'required|numeric|min:0',
    //         'qty' => 'nullable|integer|min:0',
    //         'attributes' => 'required|array|min:1',
    //         'attributes.*.attribute_id' => 'required|exists:product_attributes,id',
    //         'attributes.*.attribute_value_id' => 'required|array|min:1',
    //         'attributes.*.attribute_value_id.*' => 'required|exists:product_attribute_values,id',
    //     ]);

    //     try {
    //         DB::beginTransaction();

    //         // Update product variant
    //         $productVariant->update([
    //             'product_id' => $request->product_id,
    //             'sku' => $request->sku,
    //             'price' => $request->price,
    //             'qty' => $request->qty ?? 0,
    //         ]);
    //         // dd($productVariant);

    //         // dd($request->input('attributes'));
    //        // Step 1: Collect input values for easier lookup
    //         $inputAttributes = [];
    //         foreach ($request->input('attributes') as $attribute) {
    //             foreach ($attribute['attribute_value_id'] as $valueId) {
    //                 $inputAttributes[] = [
    //                     'attribute_id' => $attribute['attribute_id'],
    //                     'value_id' => $valueId,
    //                 ];
    //             }
    //         }

    //         // Step 2: Delete records from DB that are NOT in input
    //         $existingValues = VariantAttribute::where('product_variants_id', $productVariant->id)->get();

    //         foreach ($existingValues as $variantAttributeValue) {
    //             $inInput = collect($inputAttributes)->contains(function ($attr) use ($variantAttributeValue) {
    //                 return $attr['attribute_id'] == $variantAttributeValue->product_attribute_id &&
    //                     $attr['value_id'] == $variantAttributeValue->product_attribute_value_id;
    //             });

    //             if (!$inInput) {
    //                 $variantAttributeValue->delete();
    //             }
    //         }


    //         // Step 3: Insert records that do NOT exist
    //         foreach ($inputAttributes as $attr) {
    //             $exists = VariantAttribute::where('product_variants_id', $productVariant->id)
    //                 ->where('product_attribute_id', $attr['attribute_id'])
    //                 ->where('product_attribute_value_id', $attr['value_id'])
    //                 ->exists();

    //             if (!$exists) {
    //                 VariantAttribute::create([
    //                     'product_variants_id' => $productVariant->id,
    //                     'product_attribute_id' => $attr['attribute_id'],
    //                     'product_attribute_value_id' => $attr['value_id'],
    //                 ]);
    //             }
    //         }

    //         DB::commit();

    //         return response()->json([
    //             'message' => 'Product Variant Updated Successfully',
    //             'type' => 'success',
    //             'redirect' => route('admin.product-variants.index'),
    //         ]);
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         return response()->json([
    //             'type' => 'error',
    //             'message' => $th->getMessage(),
    //         ], 500);
    //     }
    // }




    public function destroy(ProductVariant $productVariant)
    {

        $productVariant->delete();
        // return reditr()->json(['message' => 'Product Variant Deleted Successfully', 'type' => 'success'], 200);
        return redirect()->back()->with('success', 'Product Variant Deleted Successfully');
    }
}
