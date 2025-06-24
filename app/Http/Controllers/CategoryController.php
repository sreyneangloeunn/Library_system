<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreCategoryRequest $request)
{
    $validated = $request->validated();

    $category = Category::create($validated);
    return response()->json([
        'message' => 'Category created successfully.',
        'data' => $category
    ], 201);
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                "message" => "Category not found"
            ], 404);
        }

        return response()->json([
            "message" => "Show category",
            "data" => $category,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(UpdateCategoryRequest $request, Category $category)
{
    $validated = $request->validated();
    $category->update($validated);

    return response()->json([
        'message' => 'Category updated successfully.',
        'data' => $category
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    $category->delete();

    return response()->json([
        'message' => 'Category deleted successfully.'
    ]);
}

}
