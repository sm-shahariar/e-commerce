<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Actions\FetchSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index(Request $request){

        $subCategories = (new FetchSubCategory)->execute($request);
        $categories = Category::select('id', 'name')->get();
        // dd($categories);

        if ($request->ajax()) {
            return view('components.subCategories.table', ['subCategories' => $subCategories, 'categories' => $categories])->render();
        }

        return view('backend.subCategories.index', compact('subCategories', 'categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:sub_categories,slug',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
        ]);

        try{

            DB::beginTransaction();

            $subCategory = SubCategory::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
            DB::commit();
            return response()->json(['type' => 'success', 'message' => 'SubCategory Created Successfully', 'data' => $subCategory], 201);

        }catch(\Throwable $th) {
            DB::rollback();
            return response()->json(['type' => 'error', 'message' => $th->getMessage()]);
        }
    }
        public function update(Request $request, SubCategory $subCategory) {

            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:sub_categories,slug,' . $subCategory->id,
                'category_id' => 'required|exists:categories,id',
                'description' => 'nullable|string|max:255',
            ]);

            try{

                DB::beginTransaction();

                $subCategory->update([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'category_id' => $request->category_id,
                    'description' => $request->description,
                ]);
                DB::commit();
                return response()->json(['type' => 'success', 'message' => 'SubCategory Updated Successfully', 'data' => $subCategory], 200);
            }catch(\Throwable $th) {
                DB::rollback();
                return response()->json(['type' => 'error', 'message' => $th->getMessage()]);
            }

        }

        public function destroy(SubCategory $subCategory) {
            
            $subCategory->delete();
            return response()->json(['type' => 'success', 'message' => 'SubCategory Deleted Successfully'], 200);
        }

        public function status_change(Request $request, $id) {
            $subCategory = SubCategory::find($id)->update(['status' => $request->status]);
            return response()->json(['type' => 'success', 'message' => 'Status updated successfully']);
        }
    
}
