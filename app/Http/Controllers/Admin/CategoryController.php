<?php

namespace App\Http\Controllers\Admin;

use App\Actions\FetchCategory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = (new FetchCategory)->execute($request);

        if ($request->ajax()) {
            return view('components.categories.table', ['categories' => $categories])->render();
        }

        return view('backend.categories.index', compact('categories'));
        // return response()->json(['status' => 'success', 'data' => $categories], 200);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string|max:1000',
        ]);

        DB::beginTransaction();

        try {
            // dd($request->all());

            $category = Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
            ]);
            // dd($request->file('image'));
            $category->image = $request->file('image');
            $category->save();
            // dd($category->toArray());
            DB::commit();
            return response()->json(['type' => 'success', 'message' => 'Category created successfully.'], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['type' => 'error', 'message' => 'Failed to create category.'], 500);
        }
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string|max:1000',
        ]);

        DB::beginTransaction();

        try {

            $category->update($data);
            $category->image = $request->file('image');
            $category->save();
            
            DB::commit();
            return response()->json(['type' => 'success', 'message' => 'Category updated successfully.', 'data' => $category], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['type' => 'error', 'message' => 'Failed to update category.'], 500);
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        // return response()->json(['status' => 'success', 'message' => 'Category deleted successfully.'], 200);
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    public function status_change(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->status = $request->status;
        $category->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Status updated successfully'
        ]);
    }
}
