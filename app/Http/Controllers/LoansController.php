<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Loans::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $loan = new Loans();
        $loan->member_id = $request->input('member_id');
        $loan->book_id = $request->input('book_id');
        $loan->Loan_date = $request->input('loan_date');
        $loan->due_date = $request->input('due_date');
        $loan->return_date = $request->input('return_date');
        $loan->status = $request->input('status');

        $loan->save();
        return response()->json([
            "message"=>"Create succesfully",
            "data"=>$loan,
        ]);

    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $loan = Loans::find($id);
        
        return response()->json([
        "message" => "Show loan",
        "data" => $loan,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loans $loan)
{
    // Validate incoming request
    $validated = $request->validate([
        'member_id'    => 'required|exists:members,id',
        'book_id'      => 'required|exists:books,id',
        'loan_date'    => 'required|date',
        'due_date'     => 'required|date|after_or_equal:loan_date',
        'return_date'  => 'nullable|date|after_or_equal:loan_date',
        'status'       => 'required|in:borrowed,returned,overdue',
    ]);

    // Fill and save the loan
    $loan->fill($validated);
    $loan->save();

    return response()->json([
        'message' => 'Loan updated successfully',
        'data'    => $loan,
    ], 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loans $loan)
    {
        $loan->delete();

        return response()->json([
            'message'=>'delete succesfully'
        ]);
    }
}
