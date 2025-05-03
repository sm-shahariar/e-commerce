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
            'value' => 'required|string|max:255',
        ]);

        try{

            DB::beginTransaction();
                $productAttributeValues = ProductAttributeValue::create([
                    'value' => $request->value,
                ]);
            
                // dd($productAttributeValues->toArray());

            DB::commit();
            return response()->json(['message' => 'Product Attribute Value Created Successfully', 'type' => 'success', 'data' => $productAttributeValues], 200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'], 500);
        }
    }

    public function update(Request $request, ProductAttributeValue $productAttributeValue) {
        // dd($request->all());
        $request->validate([
            'value' => 'required|array',
            'value.*' => 'required|string|max:255',
            'product_attribute_id' => 'required|exists:product_attributes,id',
        ]);

        try{

            DB::beginTransaction();


            $productAttributeValue->update([
                'value' => $request->value,
            ]);
               
                // dd($productAttributeValues->toArray());

            DB::commit();
            return response()->json(['message' => 'Product Attribute Value Updated Successfully', 'type' => 'success', 'data' => $productAttributeValue], 200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'], 500);
        }
    }


    
}
