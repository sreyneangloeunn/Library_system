<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libraries = Library::all();
        return response()->json($libraries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $library = Library::create($validated);
        return response()->json($library, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Library $library)
    {
        return response()->json($library);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Find the library by ID
    $library = Library::find($id);

    if (!$library) {
        return response()->json(['message' => 'Library not found'], 404);
    }

    // Validate the request
    $validated = $request->validate([
        'name'    => 'sometimes|required|string|max:255',
        'address' => 'sometimes|required|string|max:255',
        'phone'   => 'nullable|string|max:20',
    ]);

    // Update only the existing library
    $library->fill($validated);
    $library->save();

    return response()->json([
        'message' => 'Library updated successfully',
        'data'    => $library,
    ], 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Library $library)
{
    $library->delete();

    return response()->json([
        'message' => 'Library deleted successfully.',
    ], 200);
}

}
