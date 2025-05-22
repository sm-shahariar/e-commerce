<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Actions\FetchAttributeValues;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    public function index(Request $request) {

        $AttributeValueList = (new FetchAttributeValues)->execute($request);
        $AttributeList = Attribute::select('id', 'name')->get();
        // dd($Attributes);

        if ($request->ajax()) {
            return view('components.AttributeValues.table', [
                'AttributeValueList' => $AttributeValueList,
                'AttributeList' => $AttributeList
            ])->render();
        }
        return view('backend.AttributeValues.index', compact('AttributeValueList', 'AttributeList'));
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'value' => 'required|string|max:255',
        ]);

        try{

            DB::beginTransaction();
                $AttributeValues = AttributeValue::create([
                    'value' => $request->value,
                ]);
            
                // dd($AttributeValues->toArray());

            DB::commit();
            return response()->json(['message' => 'Product Attribute Value Created Successfully', 'type' => 'success', 'data' => $AttributeValues], 200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'], 500);
        }
    }

    public function update(Request $request, AttributeValue $AttributeValue) {
        // dd($request->all());
        $request->validate([
            'value' => 'required|array',
            'value.*' => 'required|string|max:255',
            'product_attribute_id' => 'required|exists:product_attributes,id',
        ]);

        try{

            DB::beginTransaction();


            $AttributeValue->update([
                'value' => $request->value,
            ]);
               
                // dd($AttributeValues->toArray());

            DB::commit();
            return response()->json(['message' => 'Product Attribute Value Updated Successfully', 'type' => 'success', 'data' => $AttributeValue], 200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'], 500);
        }
    }


    
}
