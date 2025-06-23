<?php

namespace App\Http\Controllers;

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
   public function store(Request $request)
{
    $category = new Category();
    $category->name = $request->input('name');
    $category->save();

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
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
