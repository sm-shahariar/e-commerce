<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Actions\FetchProductAttributes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index(Request $request) {

        $productAttributes = (new FetchProductAttributes)->execute($request);

        if ($request->ajax()) {
            return view('components.productAttributes.table', ['productAttributes' => $productAttributes])->render();
        }
        return view('backend.productAttributes.index', compact('productAttributes'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try{
            DB::beginTransaction();

            ProductAttribute::create([
                'name' => $request->name,
            ]);

            DB::commit();
            return response()->json(['message' => 'Product Attribute Created Successfully', 'type' => 'success'], 200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'], 500);
        }
    }
    public function update(Request $request, ProductAttribute $productAttribute) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try{
            DB::beginTransaction();

            $productAttribute->update([
                'name' => $request->name,
            ]);

            DB::commit();
            return response()->json(['message' => 'Product Attribute Updated Successfully', 'type' => 'success'], 200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'], 500);
        }
    }

    public function destroy(ProductAttribute $productAttribute) {

        $productAttribute->delete();
        return redirect()->back()->with('success', 'Product Attribute Deleted Successfully');
    }
}
