<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\FetchProductAttributes;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    public function index(Request $request) {

        $productAttributes = (new FetchProductAttributes)->execute($request);
        // $attributeValues = ProductAttributeValue::select('id', 'value')->get();

        if ($request->ajax()) {
            return view('components.productAttributes.table',['productAttributes' => $productAttributes])->render();
        }
        return view('backend.productAttributes.index', compact('productAttributes'));
        
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:product_attributes,name',
        ]);

        try{

            DB::beginTransaction();
            $attribute = ProductAttribute::create([
                'name' => $request->name,
            ]);

            DB::commit();
            return response()->json(['type' => 'success', 'message' => 'Attribute created successfully.'], 200);

        }catch(\Throwable $th) {
            DB::rollBack();
            return response()->json(['type' => 'error', 'message' => $th->getMessage()],500);
        }
    }


    public function update(Request $request, ProductAttribute $attribute) {
        $request->validate([
            'name' => 'required|string|max:255|unique:product_attributes,name,'.$attribute->id,
        ]);

        try{

            DB::beginTransaction();
            $attribute->update([
                'name' => $request->name,
            ]);

            DB::commit();
            return response()->json(['type' => 'success', 'message' => 'Attribute updated successfully.'], 200);

        }catch(\Throwable $th) {
            DB::rollBack();
            return response()->json(['type' => 'error', 'message' => $th->getMessage()],500);
        }
    }


    public function destroy(ProductAttribute $attribute) {

        $attribute->delete();
        // return response()->json(['type' => 'success', 'message' => 'Attribute deleted successfully.'], 200);
        return redirect()->back()->with('success', 'Attribute deleted successfully.');
    }
    
}
