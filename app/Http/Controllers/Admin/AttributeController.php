<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Actions\FetchAttributes;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(Request $request) {

        $attribute_list = (new FetchAttributes)->execute($request);

        if ($request->ajax()) {
            return view('components.Attributes.table', ['attribute_list' => $attribute_list])->render();
        }
        return view('backend.Attributes.index', compact('attribute_list'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'attribute_values' => 'required|array',
            'attribute_values.*' => 'required|string|max:255',
           
        ]);

        try{
            DB::beginTransaction();

           

            $attribute =Attribute::create([
                'name' => $request->name,
            ]);

            $index = 1;
            //dd($request->input('attribute_values'));
            foreach ($request->input('attribute_values') as $value) {

                
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'name' => $value,
                ]);

                \Log::info('loop : '. $index);
                $index++;
            }


            DB::commit();
            return response()->json(['message' => 'Product Attribute Created Successfully', 'type' => 'success'], 200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'], 500);
        }
    }
    public function update(Request $request, Attribute $Attribute) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try{
            DB::beginTransaction();

            $Attribute->update([
                'name' => $request->name,
            ]);

            DB::commit();
            return response()->json(['message' => 'Product Attribute Updated Successfully', 'type' => 'success'], 200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'type' => 'error'], 500);
        }
    }

    public function destroy(Attribute $Attribute) {

        $Attribute->delete();
        return redirect()->back()->with('success', 'Product Attribute Deleted Successfully');
    }
}
