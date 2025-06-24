<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLibraryRequest;
use App\Http\Requests\UpdateLibraryRequest;
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
    public function store(StoreLibraryRequest $request)
    {
        $validated = $request->validated();

        $library = Library::create($validated);
        return response()->json([
            'message'=>'Library create  succes!',
            'data'=> $library
        ], 201);
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
    public function update(UpdateLibraryRequest $request, Library $library)
{
    // Validate the request
    $validated = $request->validated();

    $library->update($validated);

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
