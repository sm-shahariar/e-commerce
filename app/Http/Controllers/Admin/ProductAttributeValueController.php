<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Actions\FetchProductAttributeValues;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductAttributeValueController extends Controller
{
    public function index(Request $request) {

        $productAttributeValues = (new FetchProductAttributeValues)->execute($request);
        $productAttributes = ProductAttribute::select('id', 'name')->get();
        // dd($productAttributes);

        if ($request->ajax()) {
            return view('components.productAttributeValues.table', [
                'productAttributeValues' => $productAttributeValues,
                'productAttributes' => $productAttributes
            ])->render();
        }

        return view('backend.productAttributeValues.index', compact('productAttributeValues', 'productAttributes'));
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'value' => 'required|array',
            'value.*' => 'required|string|max:255',
            'product_attribute_id' => 'required|exists:product_attributes,id',
        ]);

        try{

            DB::beginTransaction();

            $productAttributeValues = [];
            foreach ($request->value as $val) {
                $attributeValue = ProductAttributeValue::create([
                    'value' => $val,
                    'product_attribute_id' => $request->product_attribute_id,
                ]);
                // dd($attributeValue);
                $productAttributeValues[] = $attributeValue;
            }

            // dd($productAttributeValues

            DB::commit();
            return response()->json(['message' => 'Product Attribute Value Created Successfully', 'type' => 'success', 'data' => $productAttributeValues], 200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'], 500);
        }
    }


    public function update(Request $request)
    {
        $request->validate([
            'value' => 'required|array',
            'value.*.id' => 'required|exists:product_attribute_values,id',
            'value.*.value' => 'required|string|max:255',
            'product_attribute_id' => 'required|exists:product_attributes,id',
        ]);

        try {
            DB::beginTransaction();

            $updatedValues = [];

            foreach ($request->value as $item) {
                $attributeValue = ProductAttributeValue::find($item['id']);

                if ($attributeValue) {
                    $attributeValue->update([
                        'value' => $item['value'],
                        'product_attribute_id' => $request->product_attribute_id,
                    ]);
                    $updatedValues[] = $attributeValue;
                }
            }

            DB::commit();
            return response()->json([
                'message' => 'Product Attribute Values Updated Successfully',
                'type' => 'success',
                'data' => $updatedValues
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage(),
                'type' => 'error'
            ], 500);
        }
    }

    
    public function destroy(ProductAttributeValue $productAttributeValue) {

        $productAttributeValue->delete();
        return redirect()->back()->with('success', 'Product Attribute Value Deleted Successfully');
    }
}
