<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');
        $book->category_id = $request->input('category_id');
        $book->library_id = $request->input('library_id'); 
        $book->copies_available = $request->input('copies_available', 1); // optional

        $book->save();

        return response()->json([

            'message' => 'Book created successfully.',
            'data'=>$book

        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $book = Book::find($id);

    if (!$book) {
        return response()->json([
            "message" => "Book not found"
        ], 404);
    }

    return response()->json([
        "message" => "Show book",
        "data" => $book,
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
